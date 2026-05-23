<?php
$defined_vars_before = get_defined_vars();
include "koneksi.php";
$defined_vars_after = get_defined_vars();
$new_vars = array_diff_key($defined_vars_after, $defined_vars_before);

$link_db = null;
foreach ($new_vars as $val) {
    if (is_object($val) && $val instanceof mysqli) {
        $link_db = $val;
        break;
    }
}
if (!$link_db && isset($kon)) { $link_db = $kon; }
if (!$link_db && isset($conn)) { $link_db = $conn; }
if (!$link_db && isset($koneksi)) { $link_db = $koneksi; }

if (isset($_POST['nid']) && isset($_POST['nama_dosen'])) {
    $nid        = mysqli_real_escape_string($link_db, $_POST['nid']);
    $nama_dosen = mysqli_real_escape_string($link_db, $_POST['nama_dosen']);

    // Query INSERT disesuaikan ke kolom 'nid' dan 'namados'
    $query  = "INSERT INTO tbl_dosen (nid, namados) VALUES ('$nid', '$nama_dosen')";
    $simpan = mysqli_query($link_db, $query);

    if ($simpan) {
        header("location:querydosen.php?pesan=tambahsukses");
    } else {
        echo "Gagal menyimpan data dosen: " . mysqli_error($link_db);
    }
} else {
    header("location:tambahdosen.php");
}
?>