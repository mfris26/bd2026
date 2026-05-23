<?php
// 1. Cek apakah ada parameter 'nim' yang dikirim melalui URL
if (isset($_GET['nim'])) {
    include "koneksi.php"; // Panggil file koneksi database kamu

    // Ambil data NIM dari URL dan bersihkan agar aman dari SQL Injection
    $nim = mysqli_real_escape_string($link, $_GET['nim']);

    // 2. Jalankan perintah SQL untuk menghapus data berdasarkan NIM
    $query = "DELETE FROM tbl_mhs WHERE nim = '$nim'";

    if (mysqli_query($link, $query)) {
        // Jika sukses terhapus, otomatis lempar balik ke halaman tabel data mahasiswa
        header("Location: querymhs.php?pesan=hapussukses");
        exit();
    } else {
        echo "Gagal menghapus data: " . mysqli_error($link);
    }

    mysqli_close($link);
} else {
    // Jika file ini diakses langsung tanpa membawa NIM, balikkan ke halaman utama data
    header("Location: querymhs.php");
    exit();
}
?>