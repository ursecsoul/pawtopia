# Pawtopia – Laravel Web Application

**Pawtopia** adalah sebuah **web aplikasi berbasis Laravel** yang dibuat untuk menampilkan fitur-fitur sebuah pet care service, seperti katalog produk, halaman informasi, dan fitur lain yang memanfaatkan framework Laravel.
---

## Struktur Project & Cara Kerja Kode

Struktur folder utama Pawtopia seperti berikut:
- ├── app/ # Logika aplikasi (Models, Controllers, middleware)
- ├── bootstrap/ # Bootstrap framework & cache
- ├── config/ # Konfigurasi Laravel
- ├── database/ # Migration dan Seeder
- ├── public/ # File yang dipublikasikan (CSS/JS/assets)
- ├── resources/ # View (Blade), assets front-end
- ├── routes/ # File routing HTTP
- ├── storage/ # Log, session, cache
- ├── tests/ # Testing Aplikasi
- ├── vendor/ # Library Laravel & dependencies
- ├── artisan # CLI Laravel
- ├── composer.json # Dependensi package PHP


### Cara Kerja Utama Kode

#### 1. Routing (routes/web.php)
Semua **URL yang diakses browser** akan didefinisikan di `routes/web.php`. Laravel akan memetakan setiap route ke Controller yang sesuai, misalnya:

Route::get('/', [HomeController::class, 'index']);

Maksudnya:
Ketika pengunjung membuka https://domainanda/, maka Laravel akan menjalankan fungsi index() di HomeController.

### 2. Controller
Controller berada di folder app/Http/Controllers.

Fungsinya:
- Mengambil data dari Model
- Mengirim data ke View
- Mengatur logika aplikasi sebelum ditampilkan ke user

Contoh:
public function index()
{
    $products = Product::all();
    return view('home', compact('products'));
}

Artinya:
-Ambil semua data produk
-Tampilkan di view resources/views/home.blade.php

### 3. Model (Eloquent ORM)
Model adalah representasi tabel database, biasanya berada di app/Models.

Contoh:
class Product extends Model {}

Laravel Eloquent akan otomatis memetakan model ini ke tabel products di database.

### 4. Views (Blade Templates)
Folder resources/views berisi file frontend yang memakai Blade (templating engine Laravel).

Contoh:
- layouts/app.blade.php — template layout umum
- home.blade.php — halaman utama

Blade memudahkan:
- Reuse layout
- Menampilkan data dengan sintaks {{ $variable }}

### 5. Assets (CSS / JS / Images)

Folder publik seperti:
- public/css
- public/js
- public/images

Adalah tempat file CSS/JS yang akan dimuat di browser.

### 6. Database & Migration
Folder database/migrations berisi file migrasi yang digunakan untuk membuat tabel database.

Contoh cara menjalankan migrasi:
php artisan migrate

Atau juga bisa mengisi database awal dengan seeder:
php artisan db:seed

Cara Install & Jalankan (Local)

1. Clone repository:
- git clone https://github.com/ursecsoul/pawtopia.git
- cd pawtopia

2. Install dependensi:
- composer install
- npm install
- npm run dev

3. Copy file environment:
cp .env.example .env

4. Atur konfigurasi database di .env

5. Generate application key:
php artisan key:generate

6. Jalankan migrasi:
php artisan migrate

7. Jalankan server:
php artisan serve

Server akan berjalan di http://127.0.0.1:8000

Fitur :
✴ Halaman Beranda
✴ Booking
✴ Katalog Produk
✴ Form Kontak 
✴ Profile/Member
✴ Autentikasi Admin
✴ CRUD Produk & Kategori, testimoni

Teknologi yang Digunakan : 
- PHP (Laravel Framework)
- Composer
- Blade Template
- MySQL / MariaDB
- CSS/JS & assets front-end

Penulis [Adinda Rachmania]
