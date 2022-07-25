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
            <img src="../produk/produk1655215783.jpg" width="500px">
            </div>
                <div class="col-2">
                    <h2> Philodendron </h2>
                    <br>
                    <h3> Deskripsi :</h3>
                    <p>
                        <ul>
                            <br>
                            <li>Tanaman ini mudah untuk dikembangbiakkan karena karakter tanamannya memiliki akar angin yang sangat mudah tumbuh mencari tempat lembab. Agar tanaman berkembangbiak dengan cepat, potong akar udara yang tumbuh di atas permukaan tanah di dalam pot. Setelah dipotong, celupkan potongan akar ke dalam hormon perakaran dan tanam di pot baru dengan campuran media tanam yang segar.</li>
                            <br>
                            <li>Pastikan memiliki turus atau batang penyangga, karena tanaman philodendron tumbuh merambat..</li>
                            <br>
                            <li>Jika ingin dirambatkan ke bagian dinding, pastikan menyiram dinding juga ya, agar akarnya lembab.</li>
                            <br>
                            <li>Siram kocor tanaman seminggu 2x, untuk misting dapat dilakukan setiap pagi hari sebelum jam 10.</li>
                            <br>
                            <li>Berikan pupuk osmocote atau dapat juga pupuk kotoran kambing.</li>
                            <br>
                            <li>Jika akar sudah penuh pastikan memindahkan ke pot yang lebih besar.</li>
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