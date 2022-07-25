<?php 
    session_start();
	error_reporting(0);
    include '../admin/db.php';
    // include 'header.php';
    

    // mendapatkan id produk
    $id_produk = $_GET["id"];

    // query ambil data
    $ambil = $conn->query("SELECT * FROM tb_product WHERE product_id = '$id_produk'");
    $detail = $ambil->fetch_assoc();

	$kontak = mysqli_query($conn, "SELECT admin_telp, admin_email, admin_address FROM tb_admin WHERE admin_id = 1");
	$a = mysqli_fetch_object($kontak);

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<title>Kebun.Gaya</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>

<!-- Navbar-->
<?php include 'menu.php'; ?>

<!-- search -->
<div class="search">
		<div class="container">
			<form action="produk.php">
				<input type="text" name="search" placeholder="Cari Produk" value="<?php echo $_GET['search'] ?>"> 
                <input type="hidden" name="kat" value="<?php echo $_GET['kat'] ?>">
				<input type="submit" name="cari" value="Cari Produk">
			</form>
		</div>
	</div>

    <section class="konten mt-5">
        <div class="container">
            <br>
            <h3>Detail Produk</h3>
            <div class="box">
                <div class="col-2">
                    <img class="detail" src="../produk/<?php echo $detail["product_image"] ?>" width="450" alt="" class="img-responsive">
                </div>
                <div class="col-2">
                    <h2><?php echo $detail['product_name'] ?></h2>
                    <h4 class="text-danger">Rp. <?php echo number_format($detail['product_price']); ?></h4>
                    <p> Deskripsi : <?php echo $detail['product_description'] ?></p>

                    <h5>Stock: <?php echo $detail['stok_product'] ?></h5>


                    <form method="POST">
                        <div class="form-group">
                            <div class="input-group">
                                <input type="number" min="1" class="form-control" name="jumlah" max="<?php echo $detail['stok_product']?>" placeholder="Masukan Jumlah Produk" required>
                                <div class="input-group-btn">
                                    <br>
                                    <button class="btn-primary" name="beli">Beli</button>
                                </div>
                            </div>
                        </div>
                    </form>


                    <?php
                    // jika ada tombol beli
                    if (isset($_POST["beli"]))
                    {
                        // menerima jumlah
                        $jumlah = $_POST["jumlah"];
                        // masukan keranjang
                        $_SESSION["keranjang"][$id_produk] = $jumlah;

                        echo "<script>alert('produk telah masuk ke keranjang belanja');</script>";
                        echo "<script>location='keranjang.php';</script>";
                    }
                    ?>
                    

                    
                </div>
            </div>
        </div>
    </section>

 <!-- footer -->
    <div class="footer">
		<div class="container">
			<h4>Alamat</h4>
			<p><?php echo $a->admin_address?></p>

			<h4>Email</h4>
			<p><?php echo $a->admin_email?></p>

			<h4>No. Hp</h4>
			<p><?php echo $a->admin_telp?></p>
			<small>Copyright &copy; 2022 - Kebun.Gaya</small>
		</div>
    </div> 

</body>
</html>