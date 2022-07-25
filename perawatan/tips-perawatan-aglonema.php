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
            <img src="../produk/produk1655183560.jpg" width="500px">
            </div>
                <div class="col-2">
                    <h2> Aglonema </h2>
                    <br>
                    <h3> Deskripsi :</h3>
                    <p>
                        <ul>
                            <b>1. Setelah tanaman aglonema datang online apa yang perlu dilakukan?</b>
                            <li>Reset tanaman dengan cara bongkar secara keseluruhan, cuci bersih akar dan buang akar-akar yang berwarna coklat gelap karena itu sudah bukan akar aktif. Akar aktif ditandai dengan warna putih.</li>

                            <li>Jika daun lebih dari 6, diwajibkan untuk memiliki akar 5 atau 6 yang disisakan.</li>

                            <li>Potong sedikit bagian batang jika terdapat “Red Spot”. Disarankan untuk membuang bagian tersebut sampai tidak terlihat titik-titik kecoklatan.</li>

                            <li>Sediakan fungisida yang diberi sedikit air agar bertekstur bubur lalu oles ke bagian batang atau akar-akar yang sudah dibuang dan menimbulkan luka.</li>
                            <br>
                            <b>2. Bagaimana jika daun atau batang aglonema lonyot (membusuk)?</b>
                            <li>Buang bagian yang lonyot menggunakan gunting, lalu tutup bekas luka dengan fungisida yang diberi sedikit air. Jika selama 2 hari lonyot masih menyebar, maka harus dibuang sampai dengan “ketiak daun”. Pastikan menyiram tanaman dari atas daun, agar tidak ada kutu putih yang bersembunyi di “ketiak daun”.</li>
                            <li>Jika lonyot menyebar ke daun lain, disarankan memberikan bakterisida 2 hari sekali.</li>
                            <li>Jika dalam 7 hari semakin memburuk, disarankan untuk me-reset tanaman.</li>
                            <br>
                            <b>3. Bagaimana perawatan untuk tanaman aglonema agar sehat dan panjang umur?</b>
                            <li>Media tanam harus poros, artinya jika disiram air langsung mengalir ke dasar pot dan tidak ada genangan di atas pot.</li>
                            <li>Berikan sedikit pupuk osmocote merah di permukaan tanah untuk menyuburkan tanaman, dapat juga menggunakan pupuk kotoran kambing.</li>
                            <li>Siram dengan QC Gen 3 seminggu 1x, diselingi dengan pemberian Ferliquid seminggu 2x.</li>
                            <li>Saat menyiram tanaman, pastikan daun dan ketiak daun tersiram dengan rata.</li>
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