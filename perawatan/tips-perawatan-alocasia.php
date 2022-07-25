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
            <img src="../produk/produk1655219147.jpg" width="500px">
            </div>
            <div class="col-2">
                <h2> Alocasia </h2>
                    <br>
                    <h3> Deskripsi :</h3>
                    <p>
                        <ul>
                            <b>1. Apa yang perlu diperhatikan dalam merawat alocasia?</b>
                            <li>Beberapa penyakit umum menjangkiti alocasia, seperti bercak daun, hingga pembusukan pada batang dan akar. Penyakit lain yang kerap terjadi pada alocasia adalah munculnya bakteri Xanthamonas. Tanda-tanda tanaman alocasia yang terjangkit penyakit biasanya adalah munculnya bintik hitam atau cokelat tua.</li>
                            <br>
                            <li>Penyakit pada alocasia bisa dihindari dengan tidak terlalu sering menyiram, menjaga daun tetap kering, dan memberikan sirkulasi udara yang baik di sekitar tanaman. Adapun hama umum pada tanaman alocasia adalah kutu putih, sisik, kutu daun, dan tungau laba-laba.</li>
                            <br>
                            <li>Setiap beberapa minggu, siram tanaman dengan air sabun hangat untuk mencegah hama tersebut. Ini akan membantu menjaga tanaman bebas debu. Jika muncul kutu dan terlihat hama berkembang biak, gunakan minyak insektisida yang sangat halus yang akan membunuh hama dan telurnya.</li>
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