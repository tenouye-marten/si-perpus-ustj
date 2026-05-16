# SI Perpustakaan USTJ

<p align="center">
    <img src="public/assets/images/logo-ustj.png" width="120" alt="Logo USTJ">
</p>

<h3 align="center">
Sistem Informasi Perpustakaan USTJ
</h3>

---

# Panduan Setup SI Perpustakaan USTJ

## Tentang Project

SI Perpustakaan USTJ merupakan sistem informasi perpustakaan berbasis Laravel yang digunakan untuk:

* Manajemen staff
* Struktur organisasi
* Katalog buku
* Skripsi / KTI
* Authentication
* Role & permission
* Frontend perpustakaan modern

---

# Persyaratan Sistem

Sebelum menjalankan project, pastikan komputer sudah memiliki:

| Software | Versi   |
| -------- | ------- |
| PHP      | 8.2+    |
| Laravel  | 12      |
| Composer | Terbaru |
| Node.js  | 18+     |
| MySQL    | 8+      |
| Git      | Terbaru |

---

# Teknologi Yang Digunakan

## Backend

* Laravel 12
* PHP 8+
* MySQL
* Spatie Permission

## Frontend

* Blade
* Tailwind CSS
* Alpine JS
* Vite

---

# Persiapan Sebelum Menjalankan Project

Pastikan laptop / komputer sudah terinstall:

## Wajib Install

* PHP
* Composer
* Node.js
* Git
* MySQL / XAMPP / Laragon

---

# Cara Download dan Menjalankan Project

## 1. Clone Repository

Buka terminal lalu jalankan:

```bash
git clone https://github.com/USERNAME/si-perpus-ustj.git
```

---

## 2. Masuk Ke Folder Project

```bash
cd si-perpus-ustj
```

---

# Install Dependency

## Install Composer

```bash
composer install
```

---

## Install Node Modules

```bash
npm install
```

---

# Setup ENV

## Copy File ENV

### Windows

```bash
copy .env.example .env
```

### Linux / Git Bash

```bash
cp .env.example .env
```

---

## Generate APP KEY

```bash
php artisan key:generate
```

---

# Setup Database

## 1. Buat Database

Buat database baru di phpMyAdmin:

```text
si_perpus_ustj
```

---

## 2. Atur Database di ENV

Buka file `.env`

```env
DB_DATABASE=si_perpus_ustj
DB_USERNAME=root
DB_PASSWORD=
```

---

# Migration dan Seeder

## Jalankan Migration + Seeder

```bash
php artisan migrate --seed
```

---

## Jika Ingin Reset Database

```bash
php artisan migrate:fresh --seed
```

---

# Storage Link

```bash
php artisan storage:link
```

---

# Menjalankan Project

## Terminal 1

```bash
php artisan serve
```

---

## Terminal 2

```bash
npm run dev
```

---

# URL Project

```text
http://127.0.0.1:8000
```

---

# Cara Mengambil Project Dari Repository GitHub

## 1. Clone Repository

Buka terminal:

```bash
cd Desktop
```

Clone project:

```bash
git clone https://github.com/USERNAME/si-perpus-ustj.git
```

---

## 2. Masuk Folder Project

```bash
cd si-perpus-ustj
```

---

# Install Dependency Laravel

## 1. Install Composer

```bash
composer install
```

---

## 2. Install Node Modules

```bash
npm install
```

---

# Setup File ENV

## 1. Copy ENV

### Windows

```bash
copy .env.example .env
```

### Git Bash / Linux / MacOS

```bash
cp .env.example .env
```

---

## 2. Generate APP_KEY

```bash
php artisan key:generate
```

---

# Setup Database

## 1. Buat Database

Buka phpMyAdmin lalu buat database:

```text
si_perpus_ustj
```

---

## 2. Atur ENV Database

Buka file `.env`

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=si_perpus_ustj
DB_USERNAME=root
DB_PASSWORD=
```

Sesuaikan dengan komputer masing-masing.

---

# Migration dan Seeder

## Jalankan Migration

```bash
php artisan migrate --seed
```

Atau reset database:

```bash
php artisan migrate:fresh --seed
```

---

# Storage Link

WAJIB dijalankan agar upload gambar tampil.

```bash
php artisan storage:link
```

---

# Menjalankan Project

## Terminal 1

```bash
php artisan serve
```

---

## Terminal 2

```bash
npm run dev
```

---

# URL Project

```text
http://127.0.0.1:8000
```

---

# Struktur Database Tambahan

Project menggunakan table:

```text
cache
cache_locks
sessions
jobs
failed_jobs
```

Migration harus dijalankan sebelum menggunakan:

```env
CACHE_STORE=database
```

---

# Workflow Development

## Setelah Mengubah Kode

```bash
git add .
git commit -m "Update fitur"
git push
```

---

# Cara Update Project Dari GitHub

```bash
git pull
```

---

# Cara Pindah Project Via Flashdisk

## Yang Disarankan Tidak Ikut

Hapus:

```text
vendor/
node_modules/
```

Lalu copy project.

---

## Setelah Dipindah

Jalankan:

```bash
composer install
npm install
```

---

# Perintah Penting Laravel

## Clear Cache

```bash
php artisan optimize:clear
```

---

## Jalankan Seeder

```bash
php artisan db:seed
```

---

## Generate Storage Link

```bash
php artisan storage:link
```

---

# Catatan Penting

## Jangan Upload Ke GitHub

```text
.env
vendor/
node_modules/
```

---

## Yang Wajib Ada di Repository

* migration
* seeder
* routes
* controllers
* models
* views
* assets

---

# Struktur Organisasi Sistem

Project menggunakan struktur:

* Kepala
* Koordinator
* Staff

Dengan field:

* nama
* jabatan
* level
* bidang
* urutan
* foto

---

# Penutup

SI Perpustakaan USTJ telah disiapkan menggunakan standar Laravel modern sehingga:

* scalable
* aman
* production ready
* mudah dipindahkan antar laptop
* mudah dikembangkan kembali
* mendukung multi user
* mendukung role & permission
