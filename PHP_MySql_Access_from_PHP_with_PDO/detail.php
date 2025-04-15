<?php
require_once './config/database.php';

if (!isset($_GET['id'])) {
    header('Location: index.php');
    exit();
}

$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT * FROM mahasiswa WHERE id = ?");
$stmt->execute([$id]);
$mahasiswa = $stmt->fetch();

if (!$mahasiswa) {
    header('Location: index.php?error=Data+tidak+ditemukan');
    exit();
}

include './layouts/header.php';
?>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h3 class="text-2xl font-semibold mb-6 text-center">Detail Mahasiswa</h3>
    
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <!-- Kolom Kiri -->
        <div>
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Nama:</h4>
                <p><?= htmlspecialchars($mahasiswa['nama']) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">NRP:</h4>
                <p><?= htmlspecialchars($mahasiswa['nrp']) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Kelas:</h4>
                <p><?= htmlspecialchars($mahasiswa['kelas']) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Jenis Kelamin:</h4>
                <p><?= htmlspecialchars($mahasiswa['jenis_kelamin']) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Agama:</h4>
                <p><?= htmlspecialchars($mahasiswa['agama']) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Tempat/Tanggal Lahir:</h4>
                <p><?= htmlspecialchars($mahasiswa['tempat_lahir']) ?>, <?= date('d-m-Y', strtotime($mahasiswa['tanggal_lahir'])) ?></p>
            </div>
        </div>
        
        <!-- Kolom Kanan -->
        <div>
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Alamat:</h4>
                <p><?= nl2br(htmlspecialchars($mahasiswa['alamat'])) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Riwayat Pendidikan:</h4>
                <ul class="list-disc pl-5">
                    <li>SD: <?= htmlspecialchars($mahasiswa['sd']) ?></li>
                    <li>SMP: <?= htmlspecialchars($mahasiswa['smp']) ?></li>
                    <li>SMA: <?= htmlspecialchars($mahasiswa['sma']) ?></li>
                </ul>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Email:</h4>
                <p><?= htmlspecialchars($mahasiswa['email']) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Homepage:</h4>
                <p><?= $mahasiswa['homepage'] ? '<a href="'.htmlspecialchars($mahasiswa['homepage']).'" class="text-blue-500 hover:underline" target="_blank">'.htmlspecialchars($mahasiswa['homepage']).'</a>' : '-' ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Hobby:</h4>
                <p><?= htmlspecialchars($mahasiswa['hobby']) ?></p>
            </div>
            
            <div class="mb-4">
                <h4 class="font-bold text-gray-700">Interest:</h4>
                <p><?= htmlspecialchars($mahasiswa['interest']) ?></p>
            </div>
        </div>
    </div>
    
    <div class="mt-6 text-center">
        <a href="index.php" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
            Kembali
        </a>
    </div>
</div>

<?php include './layouts/footer.php'; ?>