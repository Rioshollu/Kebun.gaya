<?php
session_start();
include '../admin/db.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebun.Gaya</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<!-- Navbar-->
<?php include 'menu.php'; ?>

<div class="section">
<div class="container">
    <div class="box-1">
        <div class="row">
            <div class="col-md-8">
                <div class="panel-default-1">
                    <div class="panel-heading">
                        <h3>Daftar Sekarang</h3>
                        <br>
                        <hr>
                    </div>
                    <br>
                    <div class="panel-body">
                        <form method="post" class="form-horizontal">
                            <div class="form-group">
                                <label class="control-label">Nama</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control-2" name="nama" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="control-label">Email</label>
                                <div class="col-md-7">
                                    <input type="email" class="form-control-2" name="email" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label class="control-label">Password</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control-2" name="password" required>
                                </div>
                            </div>
                            <br>
                            </div>
                            <div class="form-group">
                                <label class="control-label">Nomor Telepon</label>
                                <div class="col-md-7">
                                    <input type="text" class="form-control-2" name="telp" required>
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <div class="col-md-7">
                                    <button class="btn-primary" name="daftar" >Daftar</button>
                                </div>
                            </div>
                        </form>
                        <?php 
                        // jk ditekan tombol daftar
                        if (isset($_POST["daftar"])) {
                        // mengambil isian nama,email,pass,tlp
                        $nama = $_POST["nama"];
                        $email = $_POST["email"];
                        $password = $_POST["password"];
                        $telp = $_POST["telp"];

                        // cek email sudah digunakan
                        $ambil = $conn->query("SELECT * FROM  tb_pelanggan WHERE email_pelanggan='$email' ");
                        $cocok = $ambil->num_rows;
                        if($cocok==1)
                        {
                            echo "<script>alert ('Pendaftaran gagal, email sudah digunakan') ;</script>";
                            echo "<script>location= 'daftar.php'; </script>";
                        }
                        else{
                            //query insert ke tabel pelanggan
                            $conn->query("INSERT INTO tb_pelanggan(email_pelanggan,password_pelanggan,nama_pelanggan,telp_pelanggan) VALUES ('$email','$password','$nama','$telp')");

                            echo "<script>alert ('Pendaftaran berhasil, silahkan login') ;</script>";
                            echo "<script>location= 'login.php'; </script>";
                        }
                        }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>
