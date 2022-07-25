<?php
session_start();

// echo"<pre>";
// print_r($_SESSION['keranjang']);
// echo"</pre>";

include '../admin/db.php';

if(empty($_SESSION["keranjang"]) OR !isset($_SESSION["keranjang"])){
    echo "<script>alert('Keranjang kosong, silahkan belanja dulu')</script>";
    echo "<script>location='../index.php';</script>";
}

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

<div class="section">
<section class="konten">
    <div class="container">
        <br>
        <h1>Keranjang Belanja</h1>
        <hr>
        <div class="box">
        <br>
            <table border = "1" class="tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subharga</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php foreach ($_SESSION["keranjang"] as $product_id => $jumlah): ?>
                    <!-- menampilkan produk yg sedang diperulangkan berdasarkan product_id-->
                    <?php
                    $ambil = $conn->query("SELECT * FROM tb_product WHERE product_id='$product_id'");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["product_price"]*$jumlah;

                    ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $pecah["product_name"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["product_price"]);?></td>
                        <td><?php echo $jumlah;?></td>
                        <td>Rp. <?php echo number_format($subharga);?></td>
                        <td><a href="hapuskeranjang.php?id=<?php echo $product_id?>" class="btn-hapus" onclick="return confirm('Yakin Ingin Menghapus ?')" >Hapus</a></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php endforeach ?>
                </tbody>
            </table>
            <br>
            <a href="../index.php" class="btn-default">Lanjutkan Belanja</a>
            <a href="checkout.php" class="btn-primary">Checkout</a>
        </div>
    </div>
</section>
</div>

</body>
</html>