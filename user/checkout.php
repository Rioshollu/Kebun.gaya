<?php
session_start();
include '../admin/db.php';
error_reporting (0); 

//jk tidak ada session pelanggan(blm login) mk dilarikan ke login.php_check_synta
if (!isset($_SESSION["pelanggan"])){
    echo "<script>alert('Silakan Login')</script>";
    echo "<script>location='login.php'</script>";
    exit();
}

if (!isset($_SESSION['keranjang']) OR empty($_SESSION['keranjang'])) {
    echo "<script>alert('Keranjang Kosong, Silahkan Belanja');</script>";
    echo "<script>location='../index.php';</script>";
    exit();
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

<!-- isi -->
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
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor=1; ?>
                    <?php $totalbelanja = 0; ?>
                    <?php foreach ($_SESSION["keranjang"] as $product_id => $jumlah): ?>
                    <!-- menampilkan produk yg sedang diperulangkan berdasarkan product_id-->
                    <?php
                    $ambil = $conn->query("SELECT * FROM tb_product WHERE product_id=$product_id");
                    $pecah = $ambil->fetch_assoc();
                    $subharga = $pecah["product_price"]*$jumlah;

                    ?>
                    <tr>
                        <td><?php echo $nomor;?></td>
                        <td><?php echo $pecah["product_name"]; ?></td>
                        <td>Rp. <?php echo number_format($pecah["product_price"]);?></td>
                        <td><?php echo $jumlah;?></td>
                        <td>Rp. <?php echo number_format($subharga);?></td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php $totalbelanja+=$subharga; ?>
                    <?php endforeach ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="4">Total Belanja</th>
                        <th class="total">Rp. <?php echo number_format($totalbelanja)  ?></th>
                    </tr>
                </tfoot>
            </table>
            <br>
            <form method="post">
                <div class="row1">
                    <div class="col-md-4">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['nama_pelanggan']?>" class="form-tabel"></input>
                    </div>
                    <div class="col-md-4">
                        <input type="text" readonly value="<?php echo $_SESSION["pelanggan"]['telp_pelanggan']?>" class="form-tabel"></input>
                    </div>    
                    <div class="col-md-4">
                        <select class="form-tabel" name="id_ongkir" required>
                            <option value="">Pilih Ongkos Kirim</option>
                            <?php 
                            $ambil= $conn->query("SELECT * FROM tb_ongkir");
                            while($ongkir = $ambil->fetch_assoc()){
                            ?>
                            <option value="<?php echo $ongkir["id_ongkir"] ?>">
                            <?php echo $ongkir["nama_kota"] ?>
                            Rp. <?php echo number_format($ongkir["tarif"]) ?>
                            </option>
                            <?php } ?>
                        </select>
                    </div>  
                </div>
                <div class="form-group">
                    <h3>Alamat Lengkap Pengirim</h3>
                    <br>
                    <textarea class = "form-control-1" name="alamat_pengirim" placeholder="Masukan alamat lengkap anda" required></textarea>
                </div>
                <button class="btn-primary" name="checkout">Checkout</button>
            </form>

            <?php 
            if (isset($_POST["checkout"])){
                $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];
                $id_ongkir = $_POST["id_ongkir"];
                $tgl_pembelian = date("y-m-d");
                $alamat_pengirim = $_POST["alamat_pengirim"];

                $ambil = $conn->query("SELECT * FROM tb_ongkir WHERE id_ongkir='$id_ongkir'");
                $arrayongkir = $ambil->fetch_assoc(); 
                $nama_kota = $arrayongkir['nama_kota'];
                $tarif = $arrayongkir['tarif'];


                $total_pembelian = $totalbelanja + $tarif;

                //1. menyimpan data ke tabel pembelian
                $conn->query("INSERT INTO tb_pembelian (id_pelanggan,id_ongkir,tgl_pembelian,total_pembelian,nama_kota,tarif,alamat_pengirim) VALUES ('$id_pelanggan','$id_ongkir','$tgl_pembelian','$total_pembelian','$nama_kota','$tarif','$alamat_pengirim')");

                // mendapatkan id_pembelian baru terjadi
                $id_pembelian_baru = $conn->insert_id;

                foreach ($_SESSION["keranjang"] as $product_id => $jumlah)
                {
                    // mendapatkan data produk berdasarkan id_produk
                    $ambil = $conn->query("SELECT * FROM tb_product WHERE product_id='$product_id'");
                    $perproduk = $ambil->fetch_assoc();

                    $nama = $perproduk['product_name'];
                    $harga = $perproduk['product_price'];
                    $subharga = $perproduk['product_price']* $jumlah;

                    $conn->query("INSERT INTO tb_pembelian_product (id_pembelian,product_id,nama,harga,subharga,jumlah) VALUES ('$id_pembelian_baru','$product_id','$nama','$harga','$subharga','$jumlah')");

                    // update stok produk
                    $conn->query("UPDATE tb_product SET stok_product=stok_product-$jumlah WHERE product_id='$product_id'");
                }

                // mengkosongkan keranjang belanja
                unset($_SESSION["keranjang"]);

                // tampilan dialihkan ke halaman nota, nota dari pembelian yang baru
                echo "<script>alert('Pembelian sukses'); </script>";
                echo "<script>location='nota.php?id=$id_pembelian_baru'; </script>";

            }
            ?>

        </div>
    </div>
</section>
</div>
    
</body>
</html>