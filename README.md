***📄 Dokumentasi Aplikasi: FitTrack Pro***

# 🏋️ FitTrack Pro

Aplikasi web Laravel untuk melacak aktivitas olahraga pengguna secara pribadi. FitTrack Pro memungkinkan pengguna login, menambahkan sesi latihan, melihat riwayat, dan mengelola data kebugaran mereka dengan antarmuka modern dan responsif.

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

### 🔐 Autentikasi
- Registrasi akun pengguna
- Login & Logout aman
- Session-based authentication

### 📊 Dashboard
- Ringkasan statistik workout
- Tampilan "Total Workouts" dan "Active Minutes"
- Daftar 3 workout terbaru

### ➕ Manajemen Workout
- Tambah sesi latihan (Type + Duration)
- Validasi input wajib
- Notifikasi sukses/error

### 📝 Riwayat Latihan
- Tabel lengkap riwayat workout
- Filter data per pengguna
- Hapus data workout

### 🗑️ Pengelolaan Data
- Hapus workout yang salah
- Konfirmasi sebelum hapus
- Proteksi kepemilikan data

---

## 🛠️ Teknologi

| Komponen | Teknologi |
|----------|-----------|
| Backend | Laravel 11, PHP 8.2+ |
| Frontend | Blade Templates, Tailwind CSS |
| Database | MySQL 5.7+ / MariaDB |
| Authentication | Session-based custom |

---

| **FITUR** | **PENGGUNA** |
|----------|----------|
| Dashboard | ✅ |
| Login/Register | ✅ |
| Tambah Workout | ✅ |
| Lihat Riwayat | ✅ |
| Hapus Workout | ✅ |

---

**struktur project**

```
fittrack-pro/
├── app/
│   ├── Models/              # Eloquent Models (User, Workout)
│   └── Http/Middleware/     # Custom Middleware
├── database/
│   └── migrations/          # Database migrations (opsional)
├── resources/views/
│   ├── auth/                # Login & Register
│   ├── dashboard/           # Dashboard utama
│   └── workouts/            # Form & View Log
├── routes/
│   └── web.php              # Route definitions
└── docs/                    # Dokumentasi tambahan
```
---
## 🤝 Kontribusi

Kontribusi sangat diterima! Silakan:
1. Fork repository ini
2. Buat branch fitur (`git checkout -b fitur/AmazingFeature`)
3. Commit perubahan (`git commit -m 'Menambah fitur amazing'`)
4. Push ke branch (`git push origin fitur/AmazingFeature`)
5. Buat Pull Request

---
