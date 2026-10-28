<?php
declare(strict_types=1);

require_once __DIR__ . '/data.php';
require_once __DIR__ . '/functions.php';

$kategoriTerpilih = isset($_GET['kategori'])
    && is_string($_GET['kategori'])
        ? $_GET['kategori']
        : 'Semua';

$kataKunci = isset($_GET['cari'])
    && is_string($_GET['cari'])
        ? trim($_GET['cari'])
        : '';

$daftarKategori = array_values(array_unique(
    array_column($daftarMenu, 'kategori')
));

if (
    $kategoriTerpilih !== 'Semua'
    && !in_array($kategoriTerpilih, $daftarKategori, true)
) {
    $kategoriTerpilih = 'Semua';
}

$menuTerfilter = filterMenu(
    $daftarMenu,
    $kategoriTerpilih,
    $kataKunci
);

$totalHasil = count($menuTerfilter);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu | Kantin Kampus TSU</title>
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
                <a class="nav-link" href="index.php">Beranda</a>
                <a class="nav-link active" href="katalog.php">Katalog Menu</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="page-banner">
            <div class="container">
                <p class="eyebrow">Pilihan untukmu</p>
                <h1>Katalog Menu Kantin</h1>
                <p>
                    Lihat pilihan makanan dan minuman beserta harga
                    serta status ketersediaannya.
                </p>
            </div>
        </section>

        <section class="section container" aria-labelledby="daftar-menu">
            <div class="section-heading">
                <h2 id="daftar-menu">Daftar Menu</h2>
                <p class="section-description">
                    Gunakan pencarian atau filter untuk menemukan menu.
                </p>
            </div>

            <form class="filter-form" action="katalog.php" method="get">
                <div class="form-group">
                    <label for="cari">Cari nama menu</label>
                    <input
                        type="search"
                        id="cari"
                        name="cari"
                        placeholder="Contoh: nasi goreng"
                        value="<?= e($kataKunci) ?>"
                    >
                </div>

                <div class="form-group">
                    <label for="kategori">Kategori</label>
                    <select id="kategori" name="kategori">
                        <option
                            value="Semua"
                            <?= $kategoriTerpilih === 'Semua' ? 'selected' : '' ?>
                        >
                            Semua Kategori
                        </option>

                        <?php foreach ($daftarKategori as $kategori): ?>
                            <option
                                value="<?= e($kategori) ?>"
                                <?= $kategoriTerpilih === $kategori ? 'selected' : '' ?>
                            >
                                <?= e($kategori) ?>
                            </option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <button class="button button-primary" type="submit">
                    Cari Menu
                </button>

                <a class="button button-outline" href="katalog.php">
                    Reset
                </a>
            </form>

            <div class="result-information">
                <p>
                    Menampilkan
                    <strong><?= e($totalHasil) ?></strong>
                    dari
                    <strong><?= e(count($daftarMenu)) ?></strong>
                    menu.
                </p>
            </div>

            <?php if ($totalHasil > 0): ?>
                <div class="menu-grid">
                    <?php foreach ($menuTerfilter as $menu): ?>
                        <article class="menu-card">
                            <div class="menu-card-top">
                                <span class="menu-emoji" aria-hidden="true">
                                    <?= e($menu['ikon']) ?>
                                </span>

                                <span class="category-badge">
                                    <?= e($menu['kategori']) ?>
                                </span>
                            </div>

                            <h3><?= e($menu['nama']) ?></h3>

                            <p class="menu-detail">
                                Tingkat kepedasan:
                                <strong><?= e($menu['pedas']) ?></strong>
                            </p>

                            <p class="price">
                                <?= e(formatRupiah($menu['harga'])) ?>
                            </p>

                            <p class="status-row">
                                Status:
                                <span class="status-badge <?= e(kelasStatus($menu['status'])) ?>">
                                    <?= e(labelStatus($menu['status'])) ?>
                                </span>
                            </p>
                        </article>
                    <?php endforeach; ?>
                </div>
            <?php else: ?>
                <div class="empty-message">
                    <span class="empty-icon" aria-hidden="true">🔎</span>
                    <h3>Menu tidak ditemukan</h3>
                    <p>
                        Coba gunakan kata kunci lain atau pilih kategori
                        yang berbeda.
                    </p>
                    <a class="button button-primary" href="katalog.php">
                        Tampilkan Semua Menu
                    </a>
                </div>
            <?php endif; ?>
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
