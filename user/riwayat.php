<?php
session_start();
include '../admin/db.php';

// jk tidak ada sesson pelanggan blm login
if (!isset($_SESSION["pelanggan"]) OR empty ($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
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
</head>
<body>

<!-- Navbar-->
<?php include 'menu.php'; ?>

<div class="section">
<section class="riwayat">
    <div class="container">
        <h3>Riwayat Belanja</h3>
        <div class="box">
            <?php echo $_SESSION["pelanggan"]["nama_pelanggan"] ?>
            
            <table border = "1" class="tabel">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Tanggal</td>
                        <td>Status</td>
                        <td>Total</td>
                        <td>Opsi</td>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor=1; 
                    // mendapatkan id_pelanggan yg login dari session
                    $id_pelanggan = $_SESSION["pelanggan"]["id_pelanggan"];

                    $ambil = $conn->query("SELECT * FROM tb_pembelian WHERE id_pelanggan='$id_pelanggan'");
                    while ($pecah = $ambil->fetch_assoc()){
                    ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah["tgl_pembelian"] ?></td>
                        <td>
                            <?php echo $pecah["status_pembelian"] ?>
                            <br>
                            <?php if (!empty($pecah["resi_pengiriman"])): ?>
                            Resi : <?php echo $pecah["resi_pengiriman"]; ?>
                            <?php endif ?>
                        </td>
                        <td>Rp. <?php echo number_format($pecah["total_pembelian"]) ?></td>
                        <td>
                            <a href="nota.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn-edit">Nota</a>

                            <?php if ($pecah["status_pembelian"] == "pending"): ?>
                            <a href="pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn-bayar">Pembayaran</a>

                            <?php else: ?>
                                <a href="lihat_pembayaran.php?id=<?php echo $pecah["id_pembelian"]; ?>" class="btn-warning">Lihat Pembayaran</a>
                            <?php endif ?>
                        </td>
                    </tr>
                    <?php $nomor++; ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</section>
</div>