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



