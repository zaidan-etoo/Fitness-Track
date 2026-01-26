# Fitness-Track
#  FitTrack Pro — Aplikasi Pelacak Kebugaran (PHP + MySQL)

> *Your Personal Fitness Companion*

FitTrack Pro adalah aplikasi web sederhana berbasis **PHP dan MySQL** yang memungkinkan pengguna mencatat, mengelola, dan memantau aktivitas olahraga harian mereka. Dibangun tanpa framework berat, aplikasi ini ringan, aman, dan mudah dijalankan di lingkungan lokal menggunakan **XAMPP**.

---

##  Fitur Utama

- ✅ **Login & Registrasi Pengguna**  
  - Username dan Password!
- ✅ **Catat Workout Baru**  
  - Nama latihan, jenis (Strength/Cardio), durasi, kalori, dan tanggal
- ✅ **Lihat Daftar Workout**  
  - Riwayat latihan diurutkan berdasarkan tanggal terbaru
- ✅ **Dashboard Ringkasan**  
  - Total workout, total durasi, total kalori terbakar
- ✅ **Desain Modern**  
  - Tampilan CSS 

---
## Struktur Database

### Tabel `users`
| Kolom | Tipe |
|------|------|
| id | INT (PK, AI) |
| username | VARCHAR(50) |
| password | VARCHAR(255) |

### Tabel `workouts`
| Kolom | Tipe |
|------|------|
| id | INT (PK, AI) |
| user_id | INT |
| name | VARCHAR(100) |
| type | VARCHAR(50) |
| duration | INT |
| calories | INT |
| date | DATE |

---

> **FitTrack Pro** — Your Personal Fitness Companion  
> Dibuat dengan tujuan untuk pembelajaran dan pengembangan diri.


---

### Dokumentasi Aplikasi Web ###

<img width="1918" height="972" alt="image" src="https://github.com/user-attachments/assets/03192fbf-f6cd-4d3a-bb9f-fdb9934feb2d" />
<img width="1868" height="857" alt="image" src="https://github.com/user-attachments/assets/c0d456ad-ccd1-43ca-a36f-1b6c3ee5f0db" />


