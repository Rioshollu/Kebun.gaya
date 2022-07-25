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
            <img src="../produk/produk1655119433.jpg" width="500px">
            </div>
            <div class="col-2">
                <h2> Anthurium </h2>
                    <br>
                    <h3> Deskripsi :</h3>
                    <p>
                        <ul>
                            <b>1.Apa yang perlu diperhatikan dalam merawat tanaman anthurium?</b>
                            <li>Umumnya, anthurium lebih menyukai tanah yang bisa menahan sejumlah air. Anthurium menyukai kelembapan namun tidak menyukai tumbuh di tanah yang basah. Bisa campurkan kulit kayu pinus, perlit, dan gambut. Sebagian besar campuran ini bisa menyerap air.</li>
                            <br>
                            <li>Anthurium dorayaki sangat senang saat disiram. Mereka memiliki habitat asli di hutan tropis yang sekelilingnya dipenuhi dengan kelembapan. Idealnya, anthurium dorayaki bisa disiram setidaknya setiap seminggu sekali. Namun, saat cuaca sedang panas, bisa menyiramnya dua kali seminggu.</li>
                            <br>
                            <li>Pastikan sekitar 5 hingga 8cm bagian atas tanah sudah kering saat disiram. Caranya, cukup tancapkan jari untuk memeriksa kelembapan tanah. Jika tanah masih dalam keadaan basah, jangan siram tanaman terlebih dahulu, ya. Hal ini bisa meminimalkan kemungkinan pembusukan akar.</li>
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