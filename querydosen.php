<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Dosen - SIAKAD</title>
    <style>
        body { font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; margin: 0; padding: 0; background-color: #f4f6f9; color: #333; }
        .container-table { width: 85%; margin: 30px auto; background-color: #ffffff; border-collapse: collapse; box-shadow: 0 4px 15px rgba(0,0,0,0.1); border-radius: 8px; overflow: hidden; }
        .main-content { padding: 40px; vertical-align: top; background-color: #fff; min-height: 400px; }
        .page-title { font-size: 24px; color: #1e5631; margin: 0 0 20px 0; font-weight: 600; border-bottom: 2px solid #1e5631; padding-bottom: 8px; }
        
        .data-table { width: 100%; border-collapse: collapse; margin-top: 15px; }
        .data-table th { background-color: #1e5631; color: white; padding: 12px; text-align: left; font-size: 14px; text-transform: uppercase; }
        .data-table td { padding: 12px; border-bottom: 1px solid #dee2e6; font-size: 14px; color: #495057; }
        .data-table tr:nth-child(even) { background-color: #f8f9fa; }
        
        .alert-success { background-color: #d4edda; color: #155724; padding: 12px; border-radius: 4px; margin-bottom: 20px; font-size: 14px; border-left: 5px solid #28a745; }
        .btn-hapus { background-color: #e74c3c; color: white; text-decoration: none; padding: 6px 12px; font-size: 12px; border-radius: 4px; font-weight: 600; transition: background 0.2s; }
        .btn-hapus:hover { background-color: #c0392b; }
    </style>
</head>
<body>

<table class="container-table" border="0">
    <tr>
        <td colspan="2">
            <?php include "atas.php"; ?>
        </td>
    </tr>
    <tr>
        <?php include "menu_kiri.php"; ?>
        <td class="main-content">
            <h2 class="page-title">Daftar Data Dosen</h2>
            
            <?php 
            if(isset($_GET['pesan'])){
                if($_GET['pesan'] == 'tambahsukses') {
                    echo "<div class='alert-success'>✅ Berhasil menambahkan data dosen baru ke sistem!</div>";
                } elseif($_GET['pesan'] == 'hapussukses') {
                    echo "<div class='alert-success' style='background-color: #f8d7da; color: #721c24; border-left-color: #dc3545;'>🗑️ Data dosen telah berhasil dihapus dari sistem!</div>";
                }
            }
            ?>

            <table class="data-table">
                <thead>
                    <tr>
                        <th width="8%">NO</th>
                        <th width="25%">NID</th>
                        <th>NAMA DOSEN</th>
                        <th width="15%" style="text-align: center;">AKSI</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Deteksi Otomatis Variabel Koneksi Database
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

                    // Menarik rekaman dari tbl_dosen menggunakan kolom 'nid' dan 'namados'
                    $query = mysqli_query($link_db, "SELECT * FROM tbl_dosen");
                    $no = 1;
                    
                    if($query) {
                        while($data = mysqli_fetch_array($query)){
                            echo "<tr>";
                            echo "<td>".$no++."</td>";
                            echo "<td>".$data['nid']."</td>";
                            echo "<td>".$data['namados']."</td>";
                            echo "<td style='text-align: center;'><a href='hapusdosen.php?nid=".$data['nid']."' class='btn-hapus' onclick=\"return confirm('Apakah Anda yakin ingin menghapus data dosen ini?')\">Hapus</a></td>";
                            echo "</tr>";
                        }
                    } else {
                        echo "<tr><td colspan='4' style='color:red;'>Gagal memuat data. Periksa koneksi atau struktur tabel Anda.</td></tr>";
                    }
                    ?>
                </tbody>
            </table>
        </td>
    </tr>
    <tr>
        <td colspan="2">
            <?php include "bawah.php"; ?>
        </td>
    </tr>
</table>

</body>
</html>