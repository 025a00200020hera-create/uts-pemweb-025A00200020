# uts-pemweb-025A00200020


# Kantin Kampus Kita

## 1. Identitas

- Nama: Hera Larissa Rudiyana 
- NIM: 025A00200020
- Kelas: A2 - 3A
- Mata kuliah: Pemrograman Web
- Program studi: Informatika

## 2. Deskripsi Proyek

Kantin Kampus TSU adalah website profil dan katalog menu kantin
kampus yang dibuat menggunakan HTML5, CSS, dan PHP dasar.
Website menampilkan informasi kantin, daftar makanan dan minuman,
harga, tingkat kepedasan, serta status ketersediaan menu.

Data disimpan menggunakan array multidimensi PHP tanpa database.
Website ini dibuat untuk memenuhi tugas UTS Proyek Mini Individu
Pemrograman Web.

## 3. Teknologi yang Digunakan

- HTML5 semantik
- CSS3
- PHP 8.0 atau lebih baru
- Git dan GitHub
- Laragon

## 4. Struktur File

- index.php: halaman profil dan ringkasan menu.
- katalog.php: halaman katalog, pencarian, dan filter kategori.
- data.php: sumber data menu dalam array multidimensi.
- functions.php: fungsi bantuan dan pengolahan data.
- style.css: desain dan tata letak website.
- assets/: tempat menyimpan gambar tambahan.
- screenshots/: tangkapan layar website.
- README.md: dokumentasi proyek.
- .gitignore: daftar file yang tidak perlu dilacak Git.

## 5. Daftar Fitur

- Profil Kantin Kampus Kita: index.php.
- Ringkasan jumlah menu: index.php.
- Ringkasan menu per kategori: index.php.
- Informasi menu termurah: index.php menggunakan cariMenuTermurah().
- Daftar menu dinamis: katalog.php menggunakan foreach.
- Pencarian menu: katalog.php menggunakan filterMenu().
- Filter kategori: katalog.php menggunakan filterMenu().
- Label status ketersediaan: functions.php menggunakan labelStatus().
- Tampilan responsif: style.css.

## 6. Fungsi PHP

Fungsi buatan sendiri:

- e(): mengamankan output HTML.
- formatRupiah(): memformat harga menjadi rupiah.
- filterMenu(): memfilter menu berdasarkan kategori dan kata kunci.
- cariMenuTermurah(): mencari menu dengan harga paling rendah.
- labelStatus(): menentukan teks status menu menggunakan match.
- kelasStatus(): menentukan kelas CSS berdasarkan status.

Fungsi array bawaan:

- count(): menghitung jumlah item.
- array_filter(): menyaring data menu.
- array_values(): menyusun ulang indeks array.
- array_column(): mengambil nilai dari kolom array.
- array_sum(): menjumlahkan harga menu.
- array_count_values(): menghitung jumlah menu per kategori.
- array_unique(): mengambil kategori yang unik.
- in_array(): memeriksa kategori yang valid.
- usort(): mengurutkan menu berdasarkan harga.

## 7. Cara Menjalankan

1. Instal dan jalankan Apache melalui XAMPP.
2. Simpan folder proyek di dalam htdocs.
3. Buka browser.
4. Akses http://localhost/uts-pemweb-NIM/.
5. Buka katalog melalui navigasi website.

Website ini tidak memerlukan database.

## 8. Tangkapan Layar

Simpan tangkapan layar setelah website berhasil dijalankan:

- screenshots/beranda.png
- screenshots/katalog.png

## 9. Referensi dan Bantuan AI

Referensi pembelajaran:

- PHP: https://www.php.net/manual/en/
- MDN HTML: https://developer.mozilla.org/en-US/docs/Web/HTML
- MDN CSS: https://developer.mozilla.org/en-US/docs/Web/CSS

Bantuan AI digunakan untuk membantu penyusunan struktur,
penulisan kode awal, dan penjelasan fungsi program.
Seluruh kode perlu diperiksa dan dipahami kembali oleh mahasiswa,
serta diuji secara langsung sebelum dikumpulkan.
