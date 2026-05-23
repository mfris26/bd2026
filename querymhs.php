<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa - SIAKAD</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f6f9;
            color: #333;
        }
        .container-table {
            width: 85%;
            margin: 30px auto;
            background-color: #ffffff;
            border-collapse: collapse;
            box-shadow: 0 4px 15px rgba(0,0,0,0.1);
            border-radius: 8px;
            overflow: hidden;
        }
        .main-content {
            padding: 40px;
            vertical-align: top;
            background-color: #fff;
            min-height: 400px;
        }
        .page-title {
            font-size: 22px;
            color: #2c3e50;
            margin-bottom: 20px;
            font-weight: 600;
            border-bottom: 2px solid #1e5631;
            padding-bottom: 8px;
            display: inline-block;
        }
        .data-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
            font-size: 14px;
        }
        .data-table th {
            background-color: #1e5631;
            color: white;
            text-align: left;
            padding: 12px 15px;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
        }
        .data-table td {
            padding: 12px 15px;
            border-bottom: 1px solid #e9ecef;
            color: #495057;
        }
        .data-table tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        .data-table tbody tr:hover {
            background-color: #f1f3f5;
            transition: background-color 0.2s ease;
        }
        .text-center {
            text-align: center;
        }
        
        /* Style Tombol Hapus */
        .btn-delete {
            background-color: #e74c3c;
            color: white;
            text-decoration: none;
            padding: 6px 12px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            transition: background 0.2s ease;
        }
        .btn-delete:hover {
            background-color: #c0392b;
        }
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
            <div class="page-title">Data Mahasiswa</div>
            
            <?php
            // Menampilkan notifikasi jika sukses menghapus data
            if (isset($_GET['pesan']) && $_GET['pesan'] == 'hapussukses') {
                echo "<div style='background-color: #d4edda; color: #155724; padding: 12px; margin-bottom: 20px; border-radius: 4px; font-size: 14px; border: 1px solid #c3e6cb;'><b>Sukses!</b> Data mahasiswa telah berhasil dihapus.</div>";
            }
            ?>

            <table class="data-table">
                <thead>
                    <tr>
                        <th width="8%" class="text-center">No</th>
                        <th width="25%">NIM</th>
                        <th>Nama Mahasiswa</th>
                        <th width="15%" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include "koneksi.php";
                    
                    $query = "SELECT * FROM tbl_mhs";
                    $result = mysqli_query($link, $query);
                    $i = 0;
                    
                    while ($data = mysqli_fetch_array($result)) {
                        $i++;
                        echo "<tr>";
                        echo "<td class='text-center'>" . $i . "</td>";
                        echo "<td>" . htmlspecialchars($data['nim']) . "</td>";
                        echo "<td>" . htmlspecialchars($data['namamhs']) . "</td>";
                        // Tombol hapus yang mengirimkan parameter nim via URL GET ditambah konfirmasi JavaScript
                        echo "<td class='text-center'>
                                <a href='hapusmhs.php?nim=" . urlencode($data['nim']) . "' class='btn-delete' onclick='return confirm(\"Apakah Anda yakin ingin menghapus data ini?\")'>Hapus</a>
                              </td>";
                        echo "</tr>";
                    }
                    
                    mysqli_close($link);
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