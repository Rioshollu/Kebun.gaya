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

<!-- Navbar-->
<?php include 'menu.php'; ?>

<div class="section">
    <div class="container">
        <h2>Tips Perawatan</h2>
        <div class="box">
            <!-- 1 -->
            <div class="col-4">
                <h3>Banana Variegata</h3>
                <img src="../produk/produk1655118277.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-banana.php">Buka</button>
                </a>
            </div>
            <!-- 2 -->
            <div class="col-4">
                <h3>Aglonema</h3>
                <img src="../produk/produk1655183560.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-aglonema.php">Buka</button>
                </a>
            </div>
            <!-- 3 -->
            <div class="col-4">
                <h3>Philodendron</h3>
                <img src="../produk/produk1655215783.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-philodendron.php">Buka</button>
                </a>
            </div>
            <!-- 4 -->
            <div class="col-4">
                <h3>Alocasia</h3>
                <img src="../produk/produk1655219147.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-alocasia.php">Buka</button>
                </a>
            </div>
            <!-- 5 -->
            <div class="col-4">
                <h3>Dieffenbachia</h3>
                <img src="../produk/produk1655216132.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-dieffenbachia.php">Buka</button>
                </a>
            </div>
            <!-- 6 -->
            <div class="col-4">
                <h3>Calathea</h3>
                <img src="../produk/produk1655218259.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-calathea.php">Buka</button>
                </a>
            </div>
            <!-- 7 -->
            <div class="col-4">
                <h3>Keladi</h3>
                <img src="../produk/produk1655216742.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-keladi.php">Buka</button>
                </a>
            </div>
            <!-- 8 -->
            <div class="col-4">
                <h3>Anthurium</h3>
                <img src="../produk/produk1655119433.jpg">
                <button class="btn-tips"> <a href="../perawatan/tips-perawatan-anthurium.php">Buka</button>
                </a>
            </div>
        </div>
        <div class="box">
            <b>* Di Kebun.Gaya, semua tanaman suda melalui reset dan perawatan rutin, maka dapat dipastikan tanaman sehat dan panjang umur dengan perawatan yang rutin. </b>
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