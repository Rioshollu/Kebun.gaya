<?php 
session_start();
include 'db.php';
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
        <h3>Data Pembeli</h3>
        <div class="box">
            <table border="1" cellspacing="0" class="tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Pelanggan</th>
                        <th>Tanggal</th>
                        <th>Status Pembelian</th>
                        <th>Total</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor= 1; ?>
                    <?php $ambil = $conn->query("SELECT * FROM tb_pembelian JOIN tb_pelanggan ON tb_pembelian.id_pelanggan=tb_pelanggan.id_pelanggan"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_pelanggan']; ?></td>
                        <td><?php echo $pecah['tgl_pembelian']; ?></td>
                        <td><?php echo $pecah['status_pembelian']; ?></td>
                        <td>Rp. <?php echo number_format($pecah['total_pembelian']); ?></td>
                        <td>
                            <a href="detail.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn-edit">Detail</a>

                            <?php if ($pecah['status_pembelian']!=="pending"): ?>
                            <a href="pembayaran.php?id=<?php echo $pecah['id_pembelian']; ?>" class="btn-bayar">Pembayaran</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>      
                </tbody>
            </table>
        </div>
    </div>
</div>
<tbody>
</body>
</html>

