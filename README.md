# uts-pemweb-025A00200020

# Kantin Kampus TSU

## Identitas Mahasiswa
- Nama: Hera Larissa Rudiyana
- NIM: 025A00200020
- Kelas: A2-3A
- Mata Kuliah: Pemograman Web

## Deskripsi Proyek
Kantin Kampus TSU adalah website sederhana untuk menampilkan profil kantin kampus dan katalog makanan serta minuman. Pengunjung dapat melihat harga, kategori, status ketersediaan, dan memilih menu berdasarkan kategori.

Proyek ini dibuat menggunakan HTML, CSS, dan PHP tanpa database.

## Fitur
- Halaman profil kantin.
- Katalog delapan menu makanan dan minuman.
- Filter kategori Semua, Makanan, dan Minuman.
- Informasi harga dan ketersediaan menu.
- Ringkasan jumlah menu.
- Informasi menu dengan harga termurah.
- Tampilan responsif untuk komputer dan HP.

## Struktur File
- `index.php`: halaman profil kantin.
- `katalog.php`: halaman katalog menu.
- `data.php`: data menu dalam array PHP.
- `functions.php`: fungsi pengolahan data dan format harga.
- `style.css`: desain dan tata letak website.
- `assets/`: gambar menu.
- `screenshots/`: tangkapan layar hasil website.

## Cara Menjalankan
1. Instal dan buka Laragon.
2. Simpan folder proyek di `C:\laragon\www\uts-pemweb-NIM`.
3. Jalankan Laragon dengan memilih Start All.
4. Buka folder proyek menggunakan VS Code.
5. Buka browser dan akses `http://localhost/uts-pemweb-NIM/`.
6. Untuk melihat katalog, buka `http://localhost/uts-pemweb-NIM/katalog.php`.

## Fungsi PHP dan Array
- `count()`: menghitung jumlah menu.
- `array_filter()`: memilih menu berdasarkan kategori.
- `array_column()`: mengambil kolom kategori dari data menu.
- `array_count_values()`: menghitung jumlah menu per kategori.
- `usort()`: mengurutkan menu berdasarkan harga.
- `in_array()`: memeriksa kategori yang diizinkan.
- `e()`: mengamankan teks sebelum ditampilkan.
- `formatRupiah()`: menampilkan harga dalam format rupiah.
- `filterMenu()`: menyaring menu berdasarkan kategori.
- `cariMenuTermurah()`: mencari menu dengan harga paling rendah.

## Screenshot
Tambahkan minimal dua screenshot:
1. Halaman beranda.
2. Halaman katalog menu.

## Referensi
- PHP: https://www.php.net/manual/en/
- MDN Web Docs: https://developer.mozilla.org/

## Penggunaan AI
AI digunakan sebagai alat bantu untuk menyusun kerangka kode dan memahami fungsi PHP. Kode diperiksa dan disesuaikan kembali oleh mahasiswa.
