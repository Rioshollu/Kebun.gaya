<?php 
session_start();
include 'db.php';
?>

<!DOCTYPE html>
<html> 
<head>
	<meta charset="utf-8">
	<meta name= "viewport" content= "width=device-width, initial-scale=1">
	<title>Kebun.Gaya</title>
	<link rel="stylesheet" type="text/css" href="../css/style.css">
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
    <!-- header -->
<?php include 'menu.php'; ?>
<div class="section">
    <div class="container">
        <h3>Detail Pembayaran</h3>
        <div class="box">

        <?php 
        //mendapatkan id_pembelian dari url
        $id_pembelian = $_GET['id'];

        //mengambil data pembelian dari tabel pembelian berdasarkan id_pembelian
        $ambil = $conn->query("SELECT * FROM tb_pembayaran WHERE id_pembelian = $id_pembelian");
        $detail = $ambil->fetch_assoc();

        ?>

        <div class="row">
            <div class="col-md-6">
                <table border="1" cellspacing="0" class="tabel">
                    <tr>
                        <th>Nama</th>
                        <td><?php echo $detail['nama']; ?></td>
                    </tr>
                    <tr>
                        <th>Bank</th>
                        <td><?php echo $detail['bank']; ?></td>
                    </tr>
                    <tr>
                        <th>Jumlah</th>
                        <td>Rp. <?php echo number_format($detail['jumlah']); ?></td>
                    </tr>
                    <tr>
                        <th>Tanggal</th>
                        <td><?php echo $detail['tanggal']; ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <img src="../bukti_pembayaran/<?php echo $detail["bukti"] ?>" alt="" class="img-responsive">
            </div>
        </div>
        <form method="post">
            <div class="form-group">
                <label>No Resi Pengiriman</label>
                <input type="text" class="form-control" name="resi">
            </div>
            <div class="form-group">
                <label>Status</label>
                <select class="form-control" name="status">
                    <option value="">Pilih Status</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Barang dikirim">Barang Dikirim</option>
                    <option value="Batal">Batal</option>
                </select>
            </div>
            <br>
            <button class="btn" name="proses">Proses</button>
        </form>
        <?php
        if (isset($_POST["proses"])){
            $resi = $_POST["resi"];
            $status = $_POST["status"];
            $conn->query("UPDATE tb_pembelian SET resi_pengiriman = '$resi', status_pembelian = '$status' WHERE id_pembelian = '$id_pembelian'");
            echo "<script>alert('Data pembelian terupdate');</script>";
            echo "<script>location='pembelian.php';</script>";
        }
        ?>
    </div>
    </div>
</div>
</body>
</html>