# 📸 Preview Project

Berikut adalah beberapa tampilan dari aplikasi sistem manajemen film:

### Halaman Beranda
![Beranda](https://raw.githubusercontent.com/WahidMuhammadDjati/film2/main/public/storage/images/beranda.png)

### Detail Film
![Detail Film](https://raw.githubusercontent.com/WahidMuhammadDjati/film2/main/public/storage/images/detail.png)


# Project Laravel - Sistem Manajemen Film

## Persyaratan Sistem
Sebelum menjalankan proyek ini, pastikan sistem Anda memiliki persyaratan berikut:

### 1. Perangkat Lunak yang Dibutuhkan
- **PHP** (Minimal versi 8.1)
- **Composer** (Dependency Manager untuk PHP)
- **MySQL** atau **PostgreSQL** (Sebagai database server)
- **Node.js** dan **NPM** (Untuk frontend dan asset bundling jika menggunakan Vite)
- **Laravel 10** atau versi yang sesuai dengan proyek ini

### 2. Instalasi
1. Clone repositori ini:
   ```sh
   git clone https://github.com/username/repository.git
   cd repository
   ```
2. Instal dependensi menggunakan Composer:
   ```sh
   composer install
   ```
3. Instal dependensi frontend jika menggunakan Vite:
   ```sh
   npm install
   ```
4. Buat file `.env` dengan menyalin dari `.env.example`:
   ```sh
   cp .env.example .env
   ```
5. Generate application key:
   ```sh
   php artisan key:generate
   ```
6. Konfigurasi database di file `.env`:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=nama_database
   DB_USERNAME=root
   DB_PASSWORD=
   ```
7. Jalankan migrasi dan seeder untuk mengisi database:
   ```sh
   php artisan migrate --seed
   ```
8. Jalankan server Laravel:
   ```sh
   php artisan serve
   ```
9. Jika menggunakan Vite untuk asset frontend:
   ```sh
   npm run dev
   ```

### 3. Fitur Utama
- Manajemen Film (CRUD)
- Kategori Film (Genre, Tahun, Negara)
- Sistem Auth (User, Admin, Author)
- Watchlist (Hanya tampilan tanpa database)
- Integrasi API untuk pengambilan data film

### 4. Akun Default (Jika Ada Seeder)
Jika seeders dijalankan, gunakan akun berikut untuk login:

- **Admin:**
  - Email: `admin@example.com`
  - Password: `password`
- **Author:**
  - Email: `author@example.com`
  - Password: `password`
  
  untuk data lebih lanjut bisa melihat dari file seeder 

### 6. Lisensi
Proyek ini menggunakan lisensi [MIT](LICENSE).

---

Semoga panduan ini membantu! Jika ada masalah, silakan buat issue atau hubungi tim pengembang.
