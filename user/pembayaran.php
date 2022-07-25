<?php
session_start();
include '../admin/db.php';

// jk tidak ada sesson pelanggan blm login
if (!isset($_SESSION["pelanggan"]) OR empty ($_SESSION["pelanggan"])) {
    echo "<script>alert('Silahkan login');</script>";
    echo "<script>location='login.php';</script>";
    exit();
}

// mendapatkan id_pembelian dari url
$idpem = $_GET["id"];
$ambil = $conn->query("SELECT * FROM tb_pembelian WHERE id_pembelian = '$idpem'");
$detpem = $ambil->fetch_assoc();

// mendapatkan id_pelanggan yg beli
$id_pelanggan_beli = $detpem["id_pelanggan"];
// mendapatkan id_pelanggan yg login
$id_pelanggan_login = $_SESSION["pelanggan"]["id_pelanggan"];

if ($id_pelanggan_beli != $id_pelanggan_login) {
    echo "<script>alert('anda tidak berhak');</script>";
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
    <div class="box">
        <h2>Konfirmasi Pembayaran</h3>
        <br>
        <p>Kirim bukti pembayaran anda disini</p>
        <div class="alert-info-1">Total tagihan anda <strong>Rp. <?php echo number_format($detpem["total_pembelian"]) ?></strong></div>
    
        <form method="post" enctype="multipart/form-data">
            <div class="form-group">
                <br>
                <label>Nama Penyetor</label>
                <input type="text" class="form-control" name="nama" required>
            </div>
            <br>
            <div class="form-group">
                <label>Bank</label>
                <input type="text" class="form-control" name="bank" required>
            </div>
            <br>
            <div class="form-group">
                <label>Jumlah</label>
                <input type="text" class="form-control" name="jumlah" min="1" required>
            </div>
            <br>
            <div class="form-group">
                <label>Bukti Pembayaran</label>
                <input type="file" class="input-control" name="bukti" required>
                <p class="text-danger"> Foto bukti harus JPG minimal 2MB</p>
            </div>
            <br>
            <button class="btn-primary" name="kirim">Kirim</button>
        </form>
    </div>

<?php 
// jk ada tombol kirim
if (isset($_POST["kirim"])) {
    // upload foto
    $namabukti = $_FILES["bukti"]["name"];
    $lokasibukti = $_FILES["bukti"]["tmp_name"];
    $namafiks = date("YmdHis")."-".$namabukti;
    move_uploaded_file($lokasibukti, "../bukti_pembayaran/$namafiks");

    $nama = $_POST["nama"];
    $bank = $_POST["bank"];
    $jumlah = $_POST["jumlah"];
    $status = "Pending";
    $tanggal = date("Y-m-d");
    
    
    $conn->query("INSERT INTO tb_pembayaran (id_pembelian,nama, bank, jumlah,tanggal, bukti) VALUES ('$idpem','$nama', '$bank', '$jumlah', '$tanggal', '$namafiks')");

    // update data pembeliiannya dari pending menjadi terbayar
    $conn->query("UPDATE tb_pembelian SET status_pembelian = 'Sudah melakukan pembayaran' WHERE id_pembelian = '$idpem'");

    echo "<script>alert('Terima kasih telah melakukan pembayaran');</script>";
    echo "<script>location='riwayat.php';</script>";

}
?>
</div>
</div>
</body>
</html>