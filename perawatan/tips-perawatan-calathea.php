<?php
session_start();
include '../admin/db.php';
$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
$a = mysqli_fetch_object($kontak);

?>

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

<!-- header -->
<header>
    <div class="container">
        <h1>Kebun.Gaya</h1>
            <ul>
                <li><a href="../index.php">Beranda</a><li> 
                <li><a href="../user/produk.php">Produk</a><li>
                <li><a href="../user/perawatan.php">Tips Perawatan</a></li> 
                <li><a href="../user/keranjang.php">Keranjang</a><li>
                <li><a href="../user/checkout.php">Checkout</a><li>
                <!-- jk sudah login(ada session pelanggan)-->
                <?php if (isset($_SESSION["pelanggan"])): ?>
                    <li><a href="../user/riwayat.php">Riwayat Belanja</a></li>
                    <li><a href="../user/logout.php">Logout</a></li>
                <!-- selain itu(blm login||blm ada session pelanggan)-->
                <?php else: ?>
                    <li><a href="../user/login.php">Login</a></li>
                <?php endif ?>
                <?php ?>
                 
            </ul>
    </div>         
</header>

<div class="section">
    <div class="container">
        <div class="box">
            <div class="col-2">
            <img src="../produk/produk1655218259.jpg" width="500px">
            </div>
            <div class="col-2">
                <h2> Calathea </h2>
                    <br>
                    <h3> Deskripsi :</h3>
                    <p>
                        <ul>
                            <b>1.Apa yang perlu diperhatikan dalam merawat tanaman Calathea?</b>
                            <li>Tanaman Hias Calathea adalah tanaman daun yang memiliki karakteristik pada corak daun yang unik dan mencolok. Bentuk daun calathea adalah oval dan tumbuh secara horizontal yang terkadang bisa melengkung ke bawah. Taman hias ini bisa membuat rumpun dengan batang yang cukup panjang. Calathea termasuk dalam tanaman daun tropis yang sangat sensitif terhadap suhu yang dingin.</li>
                            <br>
                            <li>Letakan tanaman calathea ini ditempat yang teduh, tidak terkena sinar matahari langsung karena dapat membakar daunnya.</li>
                            <br>
                            <li>Gejala penyakit atau tanda-tanda tanaman hias calathea ini bermasalah biasanya dapat terlihat dari daunnya yang mulai menguning, keputihan, muncul bercak atau spot-spot di bagian daun. Tanaman hias calathea juga bisa bergejala sangat kering jika terserang penyakit, misalnya karena kurang asupan nutrisi dari air atau pupuk, atau bisa juga karena kondisi area yang tidak cocok.</li>
                            <br>
                            <li>Pencahayaan atau penyinaran yang tidak tepat dan serangan hama dan gulma bisa menjadi penyebab calathea sakit. Jika tanaman hias ini sudah terserang penyakit, maka untuk mengatasinya bisa menggunakan semprotan fungisida setiap satu sampai dua kali dalam sebulan untuk tetap menjaga kesehatan dan kesuburan tanaman calathea.</li>
                        </ul>
                    <p>
            </div>
        </div>
    </div>
</div>

    <!-- footer -->
    <div class="footer">
        <div class="container">
            <h4>Alamat</h4>
            <p><?php echo $a->admin_address ?></p>

            <h4>Email</h4>
            <p><?php echo $a->admin_email ?></p>

            <h4>No. Hp</h4>
            <p><?php echo $a->admin_telp ?></p>
            <small>Copyright &copy; 2022 - Kebun.Gaya</small>
        </div>
    </div>
</body>
</html>