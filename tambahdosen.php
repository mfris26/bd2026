<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data Dosen - SIAKAD</title>
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
            <div class="page-title">Tambah Data Dosen Baru</div>

            <?php
            // Cek apakah tombol submit sudah diklik
            if (isset($_POST['submit'])) {
                include "koneksi.php"; // Panggil file koneksi database

                // Menangkap data dari form input dan membersihkannya
                $nidn = mysqli_real_escape_string($link, $_POST['nidn']);
                $namadosen = mysqli_real_escape_string($link, $_POST['namadosen']);
                
                // Menjalankan query INSERT ke tabel dosen (sesuaikan nama kolom & tabel dengan databasemu)
                $query = "INSERT INTO tbl_dosen (nidn, namadosen) VALUES ('$nidn', '$namadosen')";
                
                if (mysqli_query($link, $query)) {
                    echo "<div class='alert alert-success'><b>Sukses!</b> Dosen bernama <strong>$namadosen</strong> ($nidn) berhasil disimpan.</div>";
                } else {
                    echo "<div class='alert alert-danger'><b>Gagal menyimpan:</b> " . mysqli_error($link) . "</div>";
                }

                mysqli_close($link);
            }
            ?>

            <form action="" method="POST">
                <div class="form-group">
                    <label for="nidn">Nomor Induk Dosen (NIDN) :</label>
                    <input type="text" id="nidn" name="nidn" class="form-control" placeholder="Masukkan NIDN..." required autocomplete="off">
                </div>

                <div class="form-group">
                    <label for="namadosen">Nama Lengkap Dosen :</label>
                    <input type="text" id="namadosen" name="namadosen" class="form-control" placeholder="Masukkan nama lengkap beserta gelar..." required autocomplete="off">
                </div>
                
                <button type="submit" name="submit" class="btn-submit">Simpan Data Dosen</button>
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