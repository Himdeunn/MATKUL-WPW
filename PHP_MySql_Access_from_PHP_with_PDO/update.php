<?php
require_once './config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['update'])) {
    try {
        // Ambil data dari form
        $id = $_POST['id'];
        $nama = $_POST['nama'];
        $nrp = $_POST['nrp'];
        $kelas = $_POST['kelas'];
        $jenis_kelamin = $_POST['jenis_kelamin'];
        $agama = $_POST['agama'];
        $tempat_lahir = $_POST['tempat_lahir'];
        $tanggal_lahir = $_POST['tanggal_lahir'];
        $alamat = $_POST['alamat'];
        $sd = $_POST['sd'];
        $smp = $_POST['smp'];
        $sma = $_POST['sma'];
        $email = $_POST['email'];
        $homepage = $_POST['homepage'] ?? '';
        $hobby = $_POST['hobby'];
        $interest = isset($_POST['interest']) ? implode(', ', $_POST['interest']) : '';
        
        // Persiapkan query SQL dengan PDO
        $stmt = $pdo->prepare("UPDATE mahasiswa SET 
            nama = :nama, 
            nrp = :nrp, 
            kelas = :kelas, 
            jenis_kelamin = :jenis_kelamin, 
            agama = :agama, 
            tempat_lahir = :tempat_lahir, 
            tanggal_lahir = :tanggal_lahir, 
            alamat = :alamat, 
            sd = :sd, 
            smp = :smp, 
            sma = :sma, 
            email = :email, 
            homepage = :homepage, 
            hobby = :hobby, 
            interest = :interest 
            WHERE id = :id");
        
        // Bind parameter
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':nama', $nama);
        $stmt->bindParam(':nrp', $nrp);
        $stmt->bindParam(':kelas', $kelas);
        $stmt->bindParam(':jenis_kelamin', $jenis_kelamin);
        $stmt->bindParam(':agama', $agama);
        $stmt->bindParam(':tempat_lahir', $tempat_lahir);
        $stmt->bindParam(':tanggal_lahir', $tanggal_lahir);
        $stmt->bindParam(':alamat', $alamat);
        $stmt->bindParam(':sd', $sd);
        $stmt->bindParam(':smp', $smp);
        $stmt->bindParam(':sma', $sma);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':homepage', $homepage);
        $stmt->bindParam(':hobby', $hobby);
        $stmt->bindParam(':interest', $interest);
        
        // Eksekusi query
        $stmt->execute();
        
        // Redirect dengan pesan sukses
        header('Location: index.php?success=Data+berhasil+diupdate');
        exit();
    } catch (PDOException $e) {
        // Redirect dengan pesan error
        header('Location: index.php?error=Gagal+update+data: '.$e->getMessage());
        exit();
    }
} else {
    header('Location: index.php');
    exit();
}
?>