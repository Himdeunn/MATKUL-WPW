<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Produk</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-8">
    <div class="max-w-4xl mx-auto">
        <?php
        require_once 'Toko.php';
        
        // Membuat objek produk
        $produk1 = new Produk("Kipas Angin", 250000, "Elektronik Rumah Tangga");
        $produk2 = new Produk("Blender Philips", 375000, "Dapur");
        $produk3 = new Produk("Mesin Cuci Samsung", 2800000, "Elektronik Berat");
        
        // Membuat objek toko
        $toko = new Toko("Toko Indah Elektronik");
        
        // Menambahkan produk ke toko
        $toko->tambahProduk($produk1);
        $toko->tambahProduk($produk2);
        $toko->tambahProduk($produk3);
        
        // Menampilkan produk
        echo $toko->tampilkanProduk();
        ?>
    </div>
</body>
</html>