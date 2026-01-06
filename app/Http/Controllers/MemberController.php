<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MemberController extends Controller
{
    /**
     * Tampilkan halaman register/login (form sama).
     */
    public function showPage()
    { 
        return view('register');
    }

    /**
     * Proses registrasi member baru.
     */
    public function register(Request $request)
    {
        $data = $request->validate([
            'owner_name' => 'required|string|max:255',
            'email'      => 'required|string|email|max:255|unique:members',
            'phone'      => 'required|string|max:15|unique:members',
            'password'   => 'required|string|min:8|confirmed',
            'address'    => 'nullable|string|max:255',
        ]);

        $member = Member::create([
            'name'     => $data['owner_name'],
            'email'    => $data['email'],
            'phone'    => $data['phone'],
            'password' => bcrypt($data['password']),
            'address'  => $data['address'] ?? null,
            'role'     => 'member', // default setiap register jadi member
            'status'   => 'active',
        ]);

        // langsung login setelah register
        Auth::guard('member')->login($member);
        $request->session()->regenerate();

        // Redirect to pet registration page
        return redirect()->route('register.pets')
                         ->with('success', 'Account created! Now let\'s add your pets.');
    }

    /**
     * Proses login dengan phone number dan password
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required_without:phone|string|email|max:255',
            'phone' => 'required_without:email|string|max:15',
            'password' => 'required|string|min:8',
        ]);

        $field = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';
        $credentials = [
            $field => $request->input($field),
            'password' => $request->input('password')
        ];

        if (Auth::guard('member')->attempt($credentials)) {
            $request->session()->regenerate();
            $member = Auth::guard('member')->user();

            // ✅ cek role
            if ($member->role === 'admin') {
                return redirect()->route('admin.dashboard')
                               ->with('success', 'Welcome back, Admin!');
            }

            return redirect()->route('profile')
                           ->with('success', 'Login successful! Welcome back to Pawtopia.');
        }

        return back()->withErrors([
            'phone' => 'The provided credentials do not match our records.',
        ]);
    }

    /**
     * Proses logout.
     */
    public function logout(Request $request)
    {
        Auth::guard('member')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('home')->with('success', 'You have been logged out.');
    }
}
