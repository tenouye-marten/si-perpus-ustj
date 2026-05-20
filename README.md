<div align="center">

<img 
    src="https://assets.siakadcloud.com/uploads/ustj/logoaplikasi/1149.jpg" 
    width="120" 
    alt="Logo USTJ">

# SI Perpustakaan USTJ

### Sistem Informasi Perpustakaan  
Universitas Sains dan Teknologi Jayapura

<br>

<img src="https://img.shields.io/badge/Disclaimer-Latihan%20Project-DC2626?style=for-the-badge&logo=warning&logoColor=white">

<br><br>

<img src="https://img.shields.io/badge/Laravel-12-FF2D20?style=for-the-badge&logo=laravel&logoColor=white">
<img src="https://img.shields.io/badge/PHP-8.2+-777BB4?style=for-the-badge&logo=php&logoColor=white">
<img src="https://img.shields.io/badge/TailwindCSS-3.x-06B6D4?style=for-the-badge&logo=tailwindcss&logoColor=white">
<img src="https://img.shields.io/badge/MySQL-8+-4479A1?style=for-the-badge&logo=mysql&logoColor=white">

</div>

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
https://github.com/tenouye-marten/si-perpus-ustj.git
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



