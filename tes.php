<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Mahasiswa</title>
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
            margin-bottom: 25px;
            font-weight: 600;
            border-bottom: 2px solid #1e5631;
            padding-bottom: 8px;
            display: inline-block;
        }
        
        /* Styling Form */
        .form-group {
            margin-bottom: 20px;
        }
        .form-group label {
            display: block;
            font-weight: 600;
            margin-bottom: 8px;
            color: #495057;
        }
        .form-control {
            width: 100%;
            max-width: 400px;
            padding: 10px 14px;
            font-size: 14px;
            border: 1px solid #ced4da;
            border-radius: 4px;
            box-sizing: border-box;
        }
        .form-control:focus {
            border-color: #1e5631;
            outline: none;
            box-shadow: 0 0 0 3px rgba(30, 86, 49, 0.15);
        }
        .btn-submit {
            background-color: #1e5631;
            color: white;
            border: none;
            padding: 10px 20px;
            font-size: 14px;
            font-weight: 600;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.2s ease;
        }
        .btn-submit:hover {
            background-color: #153d22;
        }
        
        /* Styling Notifikasi */
        .alert {
            max-width: 400px;
            padding: 12px 15px;
            margin-bottom: 20px;
            border-radius: 4px;
            font-size: 14px;
        }
        .alert-success {
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
        }
        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
            border: 1px solid #f5c6cb;
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
            <div class="page-title">✍️ Form Input Mahasiswa Baru</div>

            <?php
            // 1. Cek apakah tombol submit sudah diklik
            if (isset($_POST['submit'])) {
                include "koneksi.php"; // Panggil koneksi database

                // Ambil data dari form dan bersihkan inputan agar aman
                $namamhs = mysqli_real_escape_string($link, $_POST['namamhs']);
                
                // Membuat NIM dummy otomatis/kosong dulu demi kecocokan struktur tabel tbl_mhs
                $nim_dummy = "MHS-" . rand(1000, 9999); 

                // 2. Jalankan query INSERT ke database
                // Menyesuaikan dengan kolom 'nim' dan 'namamhs' di tabel tbl_mhs kamu
                $query = "INSERT INTO tbl_mhs (nim, namamhs) VALUES ('$nim_dummy', '$namamhs')";
                
                if (mysqli_query($link, $query)) {
                    echo "<div class='alert alert-success'><b>Sukses!</b> Data bernama <strong>$namamhs</strong> berhasil disimpan secara instan.</div>";
                } else {
                    echo "<div class='alert alert-danger'><b>Gagal menyimpan:</b> " . mysqli_error($link) . "</div>";
                }

                mysqli_close($link);
            }
            ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="namamhs">Silahkan masukkan nama Anda :</label>
                    <input type="text" id="namamhs" name="namamhs" class="form-control" placeholder="Ketik nama lengkap..." required autocomplete="off">
                </div>
                
                <button type="submit" name="submit" class="btn-submit">💾 Submit & Simpan Data</button>
            </form>
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