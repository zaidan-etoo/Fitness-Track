***📄 Dokumentasi Aplikasi: FitTrack Pro***

FitTrack Pro adalah aplikasi web berbasis Laravel untuk melacak aktivitas olahraga pengguna secara pribadi. Aplikasi ini memungkinkan pengguna untuk login, menambahkan sesi latihan, melihat riwayat, dan mengelola data kebugaran mereka.


**🔐 3. Fitur Utama**

-✅ Autentikasi
Login: Masuk dengan username & password (hash bcrypt)
Register: Buat akun baru
Logout: Hapus session
-✅ Manajemen Workout
Add Workout: Tambah sesi latihan (Type + Duration)
View Log: Lihat daftar workout dalam tabel
Dashboard: Ringkasan statistik (Total Workout, Active Minutes)
Remove Workout: Hapus data (opsional)
-✅ Keamanan
Session-based authentication
Proteksi route (redirect ke login jika belum login)
Validasi input
Hanya pemilik data yang bisa hapus


