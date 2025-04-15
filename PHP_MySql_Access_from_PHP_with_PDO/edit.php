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

// Konversi string interest ke array
$interests = explode(', ', $mahasiswa['interest']);

include './layouts/header.php';
?>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h3 class="text-2xl font-semibold mb-6 text-center">Edit Data Mahasiswa</h3>
    
    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $mahasiswa['id'] ?>">
        
        <!-- Bagian 1: Data Pribadi -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Pribadi</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nama -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        1. Nama
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Nama Lengkap" value="<?= htmlspecialchars($mahasiswa['nama']) ?>" required>
                </div>
                
                <!-- NRP -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nrp">
                        2. NRP
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nrp" name="nrp" type="text" placeholder="NRP" value="<?= htmlspecialchars($mahasiswa['nrp']) ?>" required>
                </div>
                
                <!-- Kelas -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kelas">
                        3. Kelas
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kelas" name="kelas" type="text" placeholder="Kelas" value="<?= htmlspecialchars($mahasiswa['kelas']) ?>" required>
                </div>
                
                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        4. Jenis Kelamin
                    </label>
                    <div class="flex items-center">
                        <input id="pria" name="jenis_kelamin" type="radio" value="Pria" class="mr-2" <?= $mahasiswa['jenis_kelamin'] === 'Pria' ? 'checked' : '' ?> required>
                        <label for="pria" class="mr-4">Pria</label>
                        <input id="wanita" name="jenis_kelamin" type="radio" value="Wanita" class="mr-2" <?= $mahasiswa['jenis_kelamin'] === 'Wanita' ? 'checked' : '' ?>>
                        <label for="wanita">Wanita</label>
                    </div>
                </div>
                
                <!-- Agama -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="agama">
                        5. Agama
                    </label>
                    <select id="agama" name="agama" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" required>
                        <option value="">Pilih Agama</option>
                        <option value="Islam" <?= $mahasiswa['agama'] === 'Islam' ? 'selected' : '' ?>>Islam</option>
                        <option value="Kristen" <?= $mahasiswa['agama'] === 'Kristen' ? 'selected' : '' ?>>Kristen</option>
                        <option value="Katolik" <?= $mahasiswa['agama'] === 'Katolik' ? 'selected' : '' ?>>Katolik</option>
                        <option value="Hindu" <?= $mahasiswa['agama'] === 'Hindu' ? 'selected' : '' ?>>Hindu</option>
                        <option value="Buddha" <?= $mahasiswa['agama'] === 'Buddha' ? 'selected' : '' ?>>Buddha</option>
                        <option value="Konghucu" <?= $mahasiswa['agama'] === 'Konghucu' ? 'selected' : '' ?>>Konghucu</option>
                    </select>
                </div>
                
                <!-- Tempat/Tanggal Lahir -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        6. Tempat/Tanggal Lahir
                    </label>
                    <div class="flex">
                        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" name="tempat_lahir" type="text" placeholder="Tempat Lahir" value="<?= htmlspecialchars($mahasiswa['tempat_lahir']) ?>" required>
                        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tanggal_lahir" type="date" value="<?= htmlspecialchars($mahasiswa['tanggal_lahir']) ?>" required>
                    </div>
                </div>
                
                <!-- Alamat -->
                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">
                        7. Alamat
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap" required><?= htmlspecialchars($mahasiswa['alamat']) ?></textarea>
                </div>
            </div>
        </div>
        
        <!-- Bagian 2: Riwayat Pendidikan -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Riwayat Pendidikan</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                <!-- SD -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="sd">
                        a. SD
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sd" name="sd" type="text" placeholder="Nama SD" value="<?= htmlspecialchars($mahasiswa['sd']) ?>" required>
                </div>
                
                <!-- SMP -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="smp">
                        b. SMP
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="smp" name="smp" type="text" placeholder="Nama SMP" value="<?= htmlspecialchars($mahasiswa['smp']) ?>" required>
                </div>
                
                <!-- SMA -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="sma">
                        c. SMA
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sma" name="sma" type="text" placeholder="Nama SMA" value="<?= htmlspecialchars($mahasiswa['sma']) ?>" required>
                </div>
            </div>
        </div>
        
        <!-- Bagian 3: Kontak dan Minat -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Kontak dan Minat</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Email -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                        9. Email
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email" value="<?= htmlspecialchars($mahasiswa['email']) ?>" required>
                </div>
                
                <!-- Homepage -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="homepage">
                        10. Homepage
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="homepage" name="homepage" type="url" placeholder="http://example.com" value="<?= htmlspecialchars($mahasiswa['homepage']) ?>">
                </div>
                
                <!-- Hobby -->
                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hobby">
                        11. Hobby
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="hobby" name="hobby" type="text" placeholder="Hobby" value="<?= htmlspecialchars($mahasiswa['hobby']) ?>" required>
                </div>
                
                <!-- Interest -->
                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        12. Interest
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
                        <div class="flex items-center">
                            <input id="komputer" name="interest[]" type="checkbox" value="Komputer" class="mr-2" <?= in_array('Komputer', $interests) ? 'checked' : '' ?>>
                            <label for="komputer">Komputer</label>
                        </div>
                        <div class="flex items-center">
                            <input id="sport" name="interest[]" type="checkbox" value="Sport" class="mr-2" <?= in_array('Sport', $interests) ? 'checked' : '' ?>>
                            <label for="sport">Sport</label>
                        </div>
                        <div class="flex items-center">
                            <input id="travelling" name="interest[]" type="checkbox" value="Travelling" class="mr-2" <?= in_array('Travelling', $interests) ? 'checked' : '' ?>>
                            <label for="travelling">Travelling</label>
                        </div>
                        <div class="flex items-center">
                            <input id="writing" name="interest[]" type="checkbox" value="Writing" class="mr-2" <?= in_array('Writing', $interests) ? 'checked' : '' ?>>
                            <label for="writing">Writing</label>
                        </div>
                        <div class="flex items-center">
                            <input id="reading" name="interest[]" type="checkbox" value="Reading" class="mr-2" <?= in_array('Reading', $interests) ? 'checked' : '' ?>>
                            <label for="reading">Reading</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tombol Submit -->
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="update">
                UPDATE
            </button>
            <a href="index.php" class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
                BATAL
            </a>
        </div>
    </form>
</div>

<?php include './layouts/footer.php'; ?>