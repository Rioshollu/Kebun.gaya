<?php
    session_start();
    include '../admin/db.php';
    
$id_pembelian = $_GET['id'];

$ambil = $conn->query("SELECT * FROM tb_pembayaran LEFT JOIN tb_pembelian ON tb_pembayaran.id_pembelian = tb_pembelian.id_pembelian WHERE tb_pembelian.id_pembelian = '$id_pembelian'");
$detbay = $ambil->fetch_assoc();

// jk blm ada data pembayaran
if (empty($detbay)) {
    echo "<script>alert('Belum ada data pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";
    exit();
}

// jk data pelanggan yg bayar tidak sesuai dgn yg login
if ($_SESSION["pelanggan"]["id_pelanggan"] != $detbay["id_pelanggan"]) {
    echo "<script>alert('Anda tidak berhak melihat pembayaran orang lain');</script>";
    echo "<script>location='riwayat.php';</script>";
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
<div class="container">
    <h3>Lihat Pembayaran</h3>
    <div class="box">
        <div class="row">
            <div class="col-md-6">
                <table border="1" cellspacing="0" class="tabel">
                    <tr>
                        <td>Nama</td>
                        <td><?php echo $detbay["nama"] ?></td>
                    </tr>
                    <tr>
                        <td>Bank</td>
                        <td><?php echo $detbay["bank"] ?></td>
                    </tr>
                    <tr>
                        <td>Tanggal</td>
                        <td><?php echo $detbay["tanggal"] ?></td>
                    </tr>
                    <tr>
                        <td>Jumlah</td>
                        <td>Rp. <?php echo number_format($detbay["jumlah"]) ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="../bukti_pembayaran/<?php echo $detbay["bukti"] ?>" alt="" class="img-responsive">
            </div>
        </div>
    </div>
</div>
</div>
</body>
</html>