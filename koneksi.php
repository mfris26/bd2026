<?php
$link = mysqli_connect('localhost', 'root', '');

if (!mysqli_select_db($link, 'basisdata2026')) {
    die('Gagal konek ke database : ' . mysqli_error($link));
        }
?>