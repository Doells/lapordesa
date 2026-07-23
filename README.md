# 📢 LaporDesa - Portal Digital Desa

Sebuah sistem informasi pelaporan warga berbasis web yang dirancang khusus untuk mendukung program digitalisasi di Desa. 

## 🚀 Arsitektur & Teknologi
* **Framework:** Laravel
* **Database:** PostgreSQL by [Supabase](https://supabase.com/)
* **Deployment:** [Vercel](https://vercel.com/) (Serverless PHP)

## ✨ Fitur Utama (MVP)
* **Form Pelaporan Cepat:** Antarmuka responsif bagi warga untuk mengirimkan laporan atau aduan.
* **Daftar Laporan Terkini:** Menampilkan riwayat laporan yang terintegrasi langsung dengan database Supabase secara *real-time*.

## 🛠️ Instalasi & Menjalankan di Lingkungan Lokal (Localhost)

**Clone repository ini:**
```bash
   git clone [https://github.com/Doells/lapordesa.git](https://github.com/Doells/lapordesa.git)

**1.Masuk ke direktori proyek:**
Bash
cd lapordesa

**2.Install dependensi Composer:**
Bash
composer install

**3.Siapkan pengaturan Environment:**

Salin file konfigurasi bawaan.
Bash
cp .env.example .env

**4.Konfigurasi Database Supabase:**

Buka file .env dan atur koneksi PostgreSQL menggunakan jalur Pooler (IPv4) agar kompatibel dengan jaringan lokal ISP Indonesia:
Bash
DB_CONNECTION=pgsql
DB_HOST=aws-1-ap-south-1.pooler.supabase.com
DB_PORT=6543
DB_DATABASE=postgres
DB_USERNAME=postgres.[ID_PROJECT_SUPABASE]
DB_PASSWORD=[PASSWORD_DATABASE]

**5.Generate Application Key:**
Bash
php artisan key:generate

**6.Jalankan server lokal:**
Bash
php artisan serve

**Aplikasi dapat diakses melalui http://localhost:8000.**

## 🌍 Catatan Deployment Vercel (Serverless) ##

Aplikasi Laravel ini telah dimodifikasi agar dapat berjalan lancar di ekosistem Vercel yang menggunakan sistem Read-Only File System.

Jika melakukan deploy ulang atau fork proyek ini, pastikan:

Menggunakan builder vercel-php@0.6.2 (atau yang lebih baru) pada vercel.json.

Menerapkan pengalihan penulisan cache, session, dan view menuju folder /tmp Vercel melalui deklarasi Environment Variables.

Dikembangkan oleh Irsyadulloh Ramadhan Bagus Nuryono