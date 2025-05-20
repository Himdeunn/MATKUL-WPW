# CRUD Aplikasi Data Mahasiswa dengan Express.js dan MySQL

Aplikasi CRUD (Create, Read, Update, Delete) sederhana untuk mengelola data mahasiswa menggunakan Express.js, MySQL, dan Tailwind CSS.

## Fitur
- Menampilkan daftar mahasiswa
- Menambahkan data mahasiswa baru
- Mengedit data mahasiswa yang sudah ada
- Menghapus data mahasiswa

## Struktur Database
Database ini menggunakan MySQL dengan skema sebagai berikut:
- `id`: Auto increment primary key
- `nama`: Nama mahasiswa
- `nrp`: Nomor Registrasi Pokok mahasiswa
- `kelas`: Kelas mahasiswa
- `jenis_kelamin`: Jenis kelamin (Pria/Wanita)
- `agama`: Agama mahasiswa
- `tempat_lahir`: Tempat lahir mahasiswa
- `tanggal_lahir`: Tanggal lahir mahasiswa (format YYYY-MM-DD)
- `alamat`: Alamat mahasiswa
- `sd`, `smp`, `sma`: Riwayat pendidikan mahasiswa
- `email`: Email mahasiswa
- `homepage`: Homepage/website mahasiswa (opsional)
- `hobby`: Hobi mahasiswa (opsional)
- `interest`: Minat mahasiswa dalam bentuk JSON array

## Instalasi dan Penggunaan

### Prasyarat
- Node.js dan npm
- MySQL server

### Langkah-langkah Instalasi

1. Clone repositori ini
```
git clone <url-repositori>
cd <nama-folder>
```

2. Install dependensi
```
npm install
```

3. Buat file `.env` di root direktori dengan konten:
```
DB_HOST=localhost
DB_USER=root
DB_PASSWORD=your_password
DB_NAME=db_mahasiswa
PORT=3000
```

4. Buat database dan tabel
```
mysql -u root -p < db_schema.sql
```
atau eksekusi query yang ada di dalam file `db_schema.sql` di MySQL client Anda.

5. Build CSS dari Tailwind
```
npm run build:css
```

6. Jalankan aplikasi
```
npm start
```
atau untuk development:
```
npm run dev
```

7. Buka browser dan akses `http://localhost:3000`

## Teknologi yang Digunakan
- Express.js: Framework web untuk Node.js
- MySQL: Database relasional
- EJS: Template engine
- Tailwind CSS: Framework CSS
- Body-parser: Middleware untuk parsing request body
- Method-override: Untuk menggunakan HTTP methods yang tidak didukung oleh browser

## License
MIT