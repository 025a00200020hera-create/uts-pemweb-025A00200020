<?php
declare(strict_types=1);

function e(mixed $nilai): string
{
    return htmlspecialchars(
        (string) $nilai,
        ENT_QUOTES,
        'UTF-8'
    );
}

function formatRupiah(int $harga): string
{
    return 'Rp' . number_format($harga, 0, ',', '.');
}

function filterMenu(
    array $daftarMenu,
    string $kategori = 'Semua',
    string $kataKunci = ''
): array {
    return array_values(array_filter(
        $daftarMenu,
        function (array $menu) use ($kategori, $kataKunci): bool {
            $sesuaiKategori = $kategori === 'Semua'
                || $menu['kategori'] === $kategori;

            $sesuaiPencarian = $kataKunci === ''
                || stripos($menu['nama'], $kataKunci) !== false;

            return $sesuaiKategori && $sesuaiPencarian;
        }
    ));
}

function cariMenuTermurah(array $daftarMenu): array
{
    if (count($daftarMenu) === 0) {
        return [];
    }

    usort(
        $daftarMenu,
        function (array $menuA, array $menuB): int {
            return $menuA['harga'] <=> $menuB['harga'];
        }
    );

    return $daftarMenu[0];
}

function labelStatus(string $status): string
{
    return match ($status) {
        'Tersedia' => 'Menu tersedia',
        'Habis' => 'Menu habis',
        default => 'Status tidak diketahui',
    };
}

function kelasStatus(string $status): string
{
    return match ($status) {
        'Tersedia' => 'status-tersedia',
        'Habis' => 'status-habis',
        default => 'status-lain',
    };
}
