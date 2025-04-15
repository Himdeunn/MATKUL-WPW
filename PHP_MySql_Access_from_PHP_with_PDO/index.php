<?php require_once './config/database.php'; ?>
<?php include './layouts/header.php'; ?>

<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <form action="proses.php" method="post">
        <!-- Bagian 1: Data Pribadi -->
        <div class="mb-6">
            <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Pribadi</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <!-- Nama -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nama">
                        1. Nama
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nama" name="nama" type="text" placeholder="Nama Lengkap" required>
                </div>
                
                <!-- NRP -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="nrp">
                        2. NRP
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nrp" name="nrp" type="text" placeholder="NRP" required>
                </div>
                
                <!-- Kelas -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="kelas">
                        3. Kelas
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="kelas" name="kelas" type="text" placeholder="Kelas" required>
                </div>
                
                <!-- Jenis Kelamin -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        4. Jenis Kelamin
                    </label>
                    <div class="flex items-center">
                        <input id="pria" name="jenis_kelamin" type="radio" value="Pria" class="mr-2" required>
                        <label for="pria" class="mr-4">Pria</label>
                        <input id="wanita" name="jenis_kelamin" type="radio" value="Wanita" class="mr-2">
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
                        <option value="Islam">Islam</option>
                        <option value="Kristen">Kristen</option>
                        <option value="Katolik">Katolik</option>
                        <option value="Hindu">Hindu</option>
                        <option value="Buddha">Buddha</option>
                        <option value="Konghucu">Konghucu</option>
                    </select>
                </div>
                
                <!-- Tempat/Tanggal Lahir -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        6. Tempat/Tanggal Lahir
                    </label>
                    <div class="flex">
                        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline mr-2" name="tempat_lahir" type="text" placeholder="Tempat Lahir" required>
                        <input class="shadow appearance-none border rounded w-1/2 py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" name="tanggal_lahir" type="date" required>
                    </div>
                </div>
                
                <!-- Alamat -->
                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="alamat">
                        7. Alamat
                    </label>
                    <textarea class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="alamat" name="alamat" rows="3" placeholder="Alamat Lengkap" required></textarea>
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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sd" name="sd" type="text" placeholder="Nama SD" required>
                </div>
                
                <!-- SMP -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="smp">
                        b. SMP
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="smp" name="smp" type="text" placeholder="Nama SMP" required>
                </div>
                
                <!-- SMA -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="sma">
                        c. SMA
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="sma" name="sma" type="text" placeholder="Nama SMA" required>
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
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" name="email" type="email" placeholder="Email" required>
                </div>
                
                <!-- Homepage -->
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="homepage">
                        10. Homepage
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="homepage" name="homepage" type="url" placeholder="http://example.com">
                </div>
                
                <!-- Hobby -->
                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="hobby">
                        11. Hobby
                    </label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="hobby" name="hobby" type="text" placeholder="Hobby" required>
                </div>
                
                <!-- Interest -->
                <div class="mb-4 col-span-2">
                    <label class="block text-gray-700 text-sm font-bold mb-2">
                        12. Interest
                    </label>
                    <div class="grid grid-cols-2 md:grid-cols-5 gap-2">
                        <div class="flex items-center">
                            <input id="komputer" name="interest[]" type="checkbox" value="Komputer" class="mr-2">
                            <label for="komputer">Komputer</label>
                        </div>
                        <div class="flex items-center">
                            <input id="sport" name="interest[]" type="checkbox" value="Sport" class="mr-2">
                            <label for="sport">Sport</label>
                        </div>
                        <div class="flex items-center">
                            <input id="travelling" name="interest[]" type="checkbox" value="Travelling" class="mr-2">
                            <label for="travelling">Travelling</label>
                        </div>
                        <div class="flex items-center">
                            <input id="writing" name="interest[]" type="checkbox" value="Writing" class="mr-2">
                            <label for="writing">Writing</label>
                        </div>
                        <div class="flex items-center">
                            <input id="reading" name="interest[]" type="checkbox" value="Reading" class="mr-2">
                            <label for="reading">Reading</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Tombol Submit -->
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="simpan">
                SIMPAN
            </button>
            <button class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="reset">
                RESET
            </button>
        </div>
    </form>
</div>

<!-- Tampilkan Data -->
<div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
    <h3 class="text-lg font-semibold mb-4 border-b pb-2">Data Mahasiswa</h3>
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">NRP</th>
                    <th class="py-2 px-4 border-b">Nama</th>
                    <th class="py-2 px-4 border-b">Kelas</th>
                    <th class="py-2 px-4 border-b">Jenis Kelamin</th>
                    <th class="py-2 px-4 border-b">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $stmt = $pdo->query("SELECT * FROM mahasiswa ORDER BY id DESC");
                while ($row = $stmt->fetch()):
                ?>
                <tr>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['nrp']) ?></td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['nama']) ?></td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['kelas']) ?></td>
                    <td class="py-2 px-4 border-b"><?= htmlspecialchars($row['jenis_kelamin']) ?></td>
                    <td class="py-2 px-4 border-b">
                        <a href="detail.php?id=<?= $row['id'] ?>" class="text-blue-500 hover:text-blue-800">Detail</a> |
                        <a href="edit.php?id=<?= $row['id'] ?>" class="text-green-500 hover:text-green-800">Edit</a> |
                        <a href="hapus.php?id=<?= $row['id'] ?>" class="text-red-500 hover:text-red-800" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</div>

<?php include './layouts/footer.php'; ?>