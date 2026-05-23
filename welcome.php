<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - SIAKAD</title>
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
        .welcome-box {
            background-color: #e8f5e9;
            border-left: 5px solid #1e5631;
            padding: 20px;
            border-radius: 4px;
            margin-top: 10px;
        }
        .welcome-title {
            font-size: 24px;
            color: #1e5631;
            margin: 0 0 10px 0;
            font-weight: 600;
        }
        .welcome-desc {
            font-size: 15px;
            color: #495057;
            margin: 0;
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
            
            <?php
            // Memeriksa apakah ada data 'nama' yang dikirim lewat POST atau GET.
            // Jika tidak ada, otomatis diisi dengan kata 'Pengunjung'.
            // Di baris ini kita sesuaikan juga dengan name input dari halaman sebelumnya ('namamhs' atau 'nama')
            $nama_user = $_POST['namamhs'] ?? $_POST['nama'] ?? $_GET['nama'] ?? 'Pengunjung';
            
            // Ambil data nama dan bersihkan agar aman dari XSS
            $nama_tampil = htmlspecialchars($nama_user);
            ?>

            <div class="welcome-box">
                <h2 class="welcome-title">Selamat Datang, <?php echo $nama_tampil; ?>!</h2>
                <p class="welcome-desc">Terima kasih.</p>
            </div>

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