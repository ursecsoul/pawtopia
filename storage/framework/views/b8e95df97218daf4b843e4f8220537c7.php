<?php
    $activeColor = '#5C3B28';  // Coklat (aktif)
    $inactiveColor = '#F4A261'; // Orange (nonaktif)
?>

<nav
    style="display: flex; justify-content: space-between; align-items: center; padding: 20px; font-family: 'Poppins', sans-serif;">
    <!-- Logo -->
    <div style="display: flex; align-items: center;">
        <img src="<?php echo e(asset('images/logo.svg')); ?>" alt="Pawtopia Logo" style="height: 30px; margin-right: 10px;">
    </div>

    <!-- Menu -->
    <ul style="list-style: none; display: flex; gap: 25px; margin: 0;">
        <li>
            <a href="<?php echo e(url('/')); ?>" style="text-decoration: none; font-weight: <?php echo e(Request::is('/') ? '700' : '500'); ?>; 
                      color: <?php echo e(Request::is('/') ? $activeColor : $inactiveColor); ?>;">
                Home
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('/calendar')); ?>" style="text-decoration: none; font-weight: <?php echo e((Request::is('booking') || Request::is('calendar2')) ? '700' : '500'); ?>; 
                      color: <?php echo e((Request::is('booking') || Request::is('calendar')) ? $activeColor : $inactiveColor); ?>;">
                Booking
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('/shop')); ?>" style="text-decoration: none; font-weight: <?php echo e(Request::is('shop') ? '700' : '500'); ?>; 
                      color: <?php echo e(Request::is('shop') ? $activeColor : $inactiveColor); ?>;">
                Our Catalogue
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('/contact')); ?>" style="text-decoration: none; font-weight: <?php echo e(Request::is('contact') ? '700' : '500'); ?>; 
                      color: <?php echo e(Request::is('contact') ? $activeColor : $inactiveColor); ?>;">
                Contact
            </a>
        </li>
        <li>
            <a href="<?php echo e(url('/payment/history')); ?>" style="text-decoration: none; font-weight: <?php echo e(Request::is('payment/history') ? '700' : '500'); ?>; 
                      color: <?php echo e(Request::is('payment/history') ? $activeColor : $inactiveColor); ?>;">
                History
            </a>
        </li>

        <?php if(auth()->guard('member')->guest()): ?>
            <li>
                <a href="<?php echo e(url('/register')); ?>" style="text-decoration: none; font-weight: <?php echo e(Request::is('register') ? '700' : '500'); ?>; 
                          color: <?php echo e(Request::is('member') ? $activeColor : $inactiveColor); ?>;">
                Member
            </a>
            </li>
        <?php endif; ?>

        <?php if(auth()->guard('member')->check()): ?>
            <li>
                <a href="<?php echo e(url('/profile')); ?>" style="text-decoration: none; font-weight: <?php echo e(Request::is('profile') ? '700' : '500'); ?>; 
                      color: <?php echo e(Request::is('profile') ? $activeColor : $inactiveColor); ?>;">
                Profile
                </a>
            </li>
        <?php endif; ?>
    </ul>
</nav><?php /**PATH C:\xampp\htdocs\pawtopia\resources\views/layouts/navbar.blade.php ENDPATH**/ ?>