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

if (isset($_GET['nid'])) {
    $nid = mysqli_real_escape_string($link_db, $_GET['nid']);
    
    // Query DELETE disesuaikan ke kolom 'nid'
    $query = "DELETE FROM tbl_dosen WHERE nid = '$nid'";
    $hapus = mysqli_query($link_db, $query);

    if ($hapus) {
        header("location:querydosen.php?pesan=hapussukses");
    } else {
        echo "Gagal menghapus data dosen: " . mysqli_error($link_db);
    }
} else {
    header("location:querydosen.php");
}
?>