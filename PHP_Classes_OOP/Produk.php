<?php
class Produk {
    private $nama;
    private $harga;
    private $kategori;

    public function __construct($nama, $harga, $kategori) {
        $this->nama = $nama;
        $this->harga = $harga;
        $this->kategori = $kategori;
    }

    public function getInfoProduk() {
        return [
            'nama' => $this->nama,
            'harga' => 'Rp' . number_format($this->harga, 0, ',', '.'),
            'kategori' => $this->kategori
        ];
    }
}
?>