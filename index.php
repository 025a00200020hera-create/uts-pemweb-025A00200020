<?php
declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

$totalMenu = count($daftarMenu);

$totalMakanan = count(array_filter(
    $daftarMenu,
    function (array $menu): bool {
        return $menu['kategori'] === 'Makanan';
    }
));

$totalMinuman = count(array_filter(
    $daftarMenu,
    function (array $menu): bool {
        return $menu['kategori'] === 'Minuman';
    }
));

$menuTermurah = cariMenuTermurah($daftarMenu);

$jumlahPerKategori = array_count_values(
    array_column($daftarMenu, 'kategori')
);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Beranda | Kantin Kampus TSU</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header class="site-header">
        <div class="container header-content">
            <a class="brand" href="index.php">
                <span class="brand-icon">🍽️</span>
                <span>Kantin Kampus TSU</span>
            </a>

            <nav class="navigation" aria-label="Navigasi utama">
                <a class="nav-link active" href="index.php">Beranda</a>
                <a class="nav-link" href="katalog.php">Katalog Menu</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="hero">
            <div class="container hero-content">
                <div class="hero-text">
                    <p class="eyebrow">Teman istirahat mahasiswa</p>
                    <h1>Selamat Datang di Kantin Kampus TSU</h1>
                    <p class="hero-description">
                        Temukan pilihan makanan dan minuman untuk menemani
                        aktivitas kuliahmu. Pilih menu favorit dengan harga
                        yang ramah di kantong mahasiswa.
                    </p>
                    
                    <a class="button button-primary" href="katalog.php">
                        Lihat Katalog Menu
                    </a>
                </div>

                <div class="hero-image">
                    <img
                        src="assets/kantin.jpeg"
                        alt="Suasana Kantin Kampus TSU dengan berbagai pilihan makanan"
                    >
                </div>

            </div>
        </section>

        <section class="section container" aria-labelledby="tentang-kantin">
            <div class="section-heading">
                <p class="eyebrow">Tentang Kami</p>
                <h2 id="tentang-kantin">Tempat Makan Favorit di Kampus</h2>
            </div>

            <article class="about-card">
                <p>
                    Kantin Kampus TSU merupakan website profil dan katalog
                    sederhana yang membantu mahasiswa melihat pilihan menu
                    makanan dan minuman di lingkungan kampus.
                </p>
                <p>
                    Melalui website ini, pengunjung dapat melihat kategori,
                    harga, tingkat kepedasan, serta status ketersediaan menu
                    sebelum menentukan pilihan.
                </p>
            </article>
        </section>

        <section class="section container" aria-labelledby="ringkasan-menu">
            <div class="section-heading">
                <p class="eyebrow">Informasi Menu</p>
                <h2 id="ringkasan-menu">Ringkasan Katalog</h2>
                <p class="section-description">
                    Ringkasan berikut dihitung langsung dari data menu PHP.
                </p>
            </div>

            <div class="summary-grid">
                <article class="summary-card">
                    <span class="summary-icon">🍽️</span>
                    <h3>Total Menu</h3>
                    <p class="summary-number"><?= e($totalMenu) ?></p>
                    <p class="summary-note">Semua menu dalam katalog</p>
                </article>

                <article class="summary-card">
                    <span class="summary-icon">🍛</span>
                    <h3>Menu Makanan</h3>
                    <p class="summary-number"><?= e($totalMakanan) ?></p>
                    <p class="summary-note">Pilihan makanan</p>
                </article>

                <article class="summary-card">
                    <span class="summary-icon">🥤</span>
                    <h3>Menu Minuman</h3>
                    <p class="summary-number"><?= e($totalMinuman) ?></p>
                    <p class="summary-note">Pilihan minuman</p>
                </article>
            </div>
        </section>

        <section class="section container" aria-labelledby="menu-termurah">
            <div class="section-heading">
                <p class="eyebrow">Rekomendasi Hemat</p>
                <h2 id="menu-termurah">Menu dengan Harga Termurah</h2>
            </div>

            <?php if ($menuTermurah !== []): ?>
                <article class="featured-menu">
                    <div class="menu-emoji" aria-hidden="true">
                        <?= e($menuTermurah['ikon']) ?>
                    </div>

                    <div class="featured-menu-info">
                        <h3><?= e($menuTermurah['nama']) ?></h3>
                        <p><?= e($menuTermurah['kategori']) ?></p>
                        <p class="price">
                            <?= e(formatRupiah($menuTermurah['harga'])) ?>
                        </p>
                    </div>

                    <a class="button button-outline" href="katalog.php">
                        Lihat Menu
                    </a>
                </article>
            <?php else: ?>
                <p class="empty-message">Belum ada menu yang tersedia.</p>
            <?php endif; ?>
        </section>

        <section class="section container" aria-labelledby="kategori-menu">
            <div class="section-heading">
                <p class="eyebrow">Data Katalog</p>
                <h2 id="kategori-menu">Jumlah Menu per Kategori</h2>
            </div>

            <div class="category-list">
                <?php foreach ($jumlahPerKategori as $kategori => $jumlah): ?>
                    <article class="category-card">
                        <h3><?= e($kategori) ?></h3>
                        <p>
                            <strong><?= e($jumlah) ?></strong> menu
                        </p>
                    </article>
                <?php endforeach; ?>
            </div>

        </section>
    </main>

    <footer class="site-footer">
        <div class="container">
            <p>
                &copy; <?= e(date('Y')) ?> Kantin Kampus TSU.
                Proyek Individu Pemrograman Web.
            </p>
        </div>
    </footer>
</body>
</html>
