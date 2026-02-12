***📄 Dokumentasi Aplikasi: FitTrack Pro***

# 🏋️ FitTrack Pro

Aplikasi web Laravel untuk melacak aktivitas olahraga pengguna secara pribadi. FitTrack Pro memungkinkan pengguna login, menambahkan sesi latihan, melihat riwayat, dan mengelola data kebugaran mereka dengan antarmuka modern dan responsif.

![FitTrack Pro Dashboard](screenshots/dashboard.png)

---

## 🔧 Fitur Utama

* ✅ **Autentikasi**: Login & Register dengan session-based auth.
* 📊 **Dashboard**: Ringkasan statistik (Total Workout, Active Minutes).
* ➕ **Add Workout**: Input cepat dengan kolom Type dan Duration.
* 📝 **View Log**: Tabel riwayat workout yang terorganisir.
* 🗑️ **Remove Workout**: Hapus data lama dengan konfirmasi aman.
* 🔒 **Keamanan**: Proteksi route, validasi input, dan enkripsi data.
* 🌙 **Desain**: Tampilan Dark Mode menggunakan font Inter.

---

## 🛠️ Teknologi yang Digunakan

| Komponen | Teknologi |
| :--- | :--- |
| **Framework** | Laravel 10/11 |
| **Database** | MySQL / PostgreSQL |
| **Frontend** | Tailwind CSS & Blade Templating |
| **Icons** | Lucide Icons / FontAwesome |

---

## 🗂️ Struktur Proyek

Berikut adalah folder utama dalam pengembangan aplikasi ini:

* `app/Models/` : Logika database untuk User dan Workout.
* `app/Http/Controllers/` : Logika bisnis dan navigasi halaman.
* `resources/views/` : File tampilan (Blade templates).
* `routes/web.php` : Definisi jalur akses URL aplikasi.
* `database/migrations/` : Struktur tabel database.

---

## 🚀 Cara Instalasi

1. **Clone repositori:**
   ```bash
   git clone [https://github.com/username/fittrack-pro.git](https://github.com/username/fittrack-pro.git)
2. **Jalankan XAMPP Control Panel → start Apache dan MySQL**
3. **Buat database di phpMyAdmin:
Buka http://localhost/phpmyadmin
Klik New → nama: fittrack_laravel → Create**
4. **Sesuaikan file .env:**
### Konfigurasi Database (.env)
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fittrack_laravel
DB_USERNAME=root
DB_PASSWORD=
```
5. **Install dependencies:**
* *composer install*
6. **Jalankan aplikasi:**
* *php artisan serve*
7. **Buka di browser:**
* *http://127.0.0.1:8000*

## **🗃️ Database Schema**
**Tabel users**
| Kolom | Tipe | Keterangan |
| :--- | :--- | :---- |
| id | bigint | Primary Key |
| username | varchar(255) | Unik |
| password | varchar(255) | Hash bcrypt |

**Tabel Workouts**
| Kolom | Tipe | Keterangan |
| :--- | :--- | :--- |
| `id` | bigint | Primary Key |
| `user_id` | int | Foreign Key ke `users.id` |
| `workout_name` | varchar(255) | Nama latihan |
| `workout_type` | varchar(50) | Jenis latihan |
| `duration` | int | Durasi dalam menit |
| `created_at` | timestamp | Waktu pembuatan |
| `updated_at` | timestamp | Waktu pembaruan |

![Teks Alternatif]()

### 🗃️ Database Entity Schema

| Entitas | Kolom | Keterangan |
| :--- | :--- | :--- |
| **users** | `id` | Primary Key (PK) |
| | `username` | Unik, untuk login |
| | `password` | Hash bcrypt |
| **workouts** | `id` | Primary Key (PK) |
| | `user_id` | Foreign Key (FK) ke `users.id` |
| | `workout_name` | Nama latihan (otomatis = type) |
| | `workout_type` | Jenis latihan (Push Up, Run, dll.) |
| | `duration` | Durasi dalam menit |
| | `created_at` | Timestamp otomatis |
| | `updated_at` | Timestamp otomatis |
