<?php
session_start();
include '../admin/db.php'; ?>

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
<section class="konten">
    <div class="container">
        <div class="box">


        <!-- nota disini copas dari nota di admin-->
                <h3>Detail Pembelian</h3>
                <hr>
                <br>
                <?php $ambil = $conn->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan WHERE tb_pembelian.id_pembelian='$_GET[id]'"); 
                $detail = $ambil->fetch_assoc(); ?>

                <!-- user yg beli harus user yg login -->
                <?php 
                // mendapatkan id_user yg beli
                $iduserbeli = $detail["id_pelanggan"];
                // mendapatkanid_user yg login
                $iduserlogin = $_SESSION["pelanggan"]["id_pelanggan"];
                
                if($iduserbeli!==$iduserlogin){
                    echo "<script>alert('Jangan iseng');</script>";
                    echo "<script>location='riwayat.php';</script>";
                    exit();
                }
                ?>

                <div class="row2">
                    <div class="col-md-4">
                        <h3>Pembelian</h3>
                        <br>
                        <strong>No. Pembelian: <?php echo $detail['id_pembelian']; ?></strong> <br>
                        Tanggal: <?php echo $detail['tgl_pembelian']; ?><br>
                        Total : Rp. <?php echo number_format($detail['total_pembelian']); ?>
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
                <br>
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
                    <?php $ambil = $conn->query("SELECT * FROM tb_pembelian_product WHERE id_pembelian='$_GET[id]'"); ?>
                    <?php while($pecah=$ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['harga']); ?></td>
                        <td><?php echo $pecah['jumlah']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
                    </tr>
                    <?php $nomor++ ; ?>
                    <?php } ?>
                </tbody>
            </table>

            <div class="row">
                <div class="col-md-7">
                    <div class="alert-info" >
                        <br>
                        <p>
                            Silahkan melakukan pembayaran Rp. <?php echo number_format($detail['total_pembelian']); ?> ke <br>
                            <strong> BANK BCA 4210242541 AN. Rio Shollu Saputra </strong>
                        </p>
                    </div>
                </div>
    </div>
</section>
</div>
    
</body>
</html> 