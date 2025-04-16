<?php
require_once 'Produk.php';

class Toko {
    private $namaToko;
    private $listProduk = [];

    public function __construct($namaToko) {
        $this->namaToko = $namaToko;
    }

    public function tambahProduk(Produk $produk) {
        $this->listProduk[] = $produk;
    }

    public function tampilkanProduk() {
        $output = '<div class="bg-white shadow-lg rounded-lg p-6 mb-8">';
        $output .= '<h2 class="text-2xl font-bold text-gray-800 mb-4">Daftar Produk - ' . $this->namaToko . '</h2>';
        
        foreach ($this->listProduk as $index => $produk) {
            $info = $produk->getInfoProduk();
            $output .= '<div class="mb-6 p-4 bg-gray-50 rounded-lg">';
            $output .= '<h3 class="text-lg font-semibold text-blue-600">' . ($index + 1) . '. ' . $info['nama'] . '</h3>';
            $output .= '<div class="ml-4 mt-2">';
            $output .= '<p class="text-gray-600"><span class="font-medium">Harga:</span> ' . $info['harga'] . '</p>';
            $output .= '<p class="text-gray-600"><span class="font-medium">Kategori:</span> ' . $info['kategori'] . '</p>';
            $output .= '</div></div>';
        }
        
        $output .= '</div>';
        return $output;
    }
}
?>