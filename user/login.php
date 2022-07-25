<?php
session_start();
include '../admin/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Kebun.Gaya</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>
<body>

<!-- Navbar-->
<?php include 'menu.php'; ?>

<div class="container">
    <div class="row">
        <div class="col-md-4">
           <div class="panel-default">
               <div class="panel-heading">
                   <h3 class="tittle-login">Login Pelanggan</h3>
               </div>
               <div class="container">
                    <form action="" method="POST">
                        <input type="email" name="email" placeholder="Email" class="input-control">
                        <input type= "password" name="pass" placeholder="Password" class="input-control">
                        <input type= "submit" name="submit" value="Log in" class="btn">
		            </form>
                    <br>
                    <p>Belum punya akun? <a href="daftar.php" style="color: blue; text-decoration: underline;" >Daftar</a></p>
               </div>
           </div>
        </div>
    </div>
</div>
</div>

<?php
//jk ada tombol simpan(tombol simpan ditekan)
if (isset($_POST["submit"])){

    $email = $_POST["email"];
    $password = $_POST["pass"];
    //laukan kuery ngecek akun di tabel pelanggan di db
    $ambil = $conn->query("SELECT * FROM tb_pelanggan WHERE email_pelanggan='$email' AND password_pelanggan='$password'");

    //ngitung akun yg terambil
    $cekakun = $ambil->num_rows;

    //jika 1 akun yg cocok, maka diloginkan
    if ($cekakun==1){
        //anda sudah login
        // mendapatkan akun dlm bentuk array
        $akun = $ambil->fetch_assoc();
        // simpan di session pelanggan
        $_SESSION["pelanggan"] = $akun;
        echo"<script>alert('Anda Berhasil Login');</script>";

        // jk sudah belanja
        if (isset($_SESSION["keranjang"]) OR !empty ($_SESSION["keranjang"])){
            echo "<script>location='checkout.php';</script>";
        }else {
            echo"<script>location='riwayat.php';</script>";
        }

    }else{
        //anda gagal login
        echo"<script>alert('Anda gagal login, periksa akun & password anda');</script>";
        echo"<script>location='login.php';</script>";
    }
}
?>
    
</body>
</html>