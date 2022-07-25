<?php 
session_start();
include 'db.php';
if($_SESSION['status_login'] != true){
    echo '<script>window.location="login.php"</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kebun.Gaya</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
 
<!-- header -->
<?php include 'menu.php'; ?>
<!-- content -->
<div class="section">
    <div class="container">
        <h3>Detail Pembelian</h3>
        <div class="box">
            <?php $ambil = $conn->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian='$_GET[id]'"); 
            $detail = $ambil->fetch_assoc(); ?>

            <div class="row2">
                <div class="col-md-4">
                    <h3>Pembelian</h3>
                    <br>
                    <p>
                        Tanggal <?php echo $detail['tgl_pembelian']; ?><br>
                        Total : Rp. <?php echo number_format($detail['total_pembelian']); ?><br>
                        Status : <?php echo $detail['status_pembelian']; ?><br>
                    </p>
                </div>
                <div class="col-md-4">
                    <h3>Pelanggan</h3>
                    <br>
                    <strong><?php echo $detail['nama_pelanggan']; ?></strong>
                    <p>
                        <?php echo $detail['telp_pelanggan']; ?> <br>
                        <?php echo $detail['email_pelanggan']; ?>
                    </p>
                </div>
                <div class="word">
                    <h3>Pengiriman</h3>
                    <br>
                    <strong><?php echo $detail['nama_kota']; ?></strong> <br>
                    Ongkos Kirim: Rp. <?php echo number_format($detail['tarif']); ?> <br>
                    <p>Alamat: <?php echo $detail['alamat_pengirim']; ?></p>
                </div>
            </div>
                <table border="1" cellspacing="0" class="tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Produk</th>
                        <th>Harga</th>
                        <th>Jumlah</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>  
                <tbody>
                    <?php $nomor=1; ?>
                    <?php $ambil = $conn->query("SELECT * FROM tb_pembelian_product JOIN tb_product ON tb_pembelian_product.product_id=tb_product.product_id WHERE tb_pembelian_product.id_pembelian='$_GET[id]'"); ?>
                    <?php while($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['product_name']; ?></td>
                        <td>Rp.<?php echo number_format($pecah['product_price']); ?></td>
                        <td><?php echo $pecah['jumlah']; ?></td>
                        <td>Rp.<?php echo number_format($pecah['product_price']*$pecah['jumlah']); ?></td>
                    </tr>
                    <?php $nomor++ ; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</body>
</html>

