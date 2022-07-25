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
        <h3>Data Pelanggan</h3>
        <div class="box">
            <table border="1" cellspacing="0" class="tabel">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Telepon</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor= 1; ?>
                    <?php $ambil = $conn->query("SELECT * FROM tb_pelanggan"); ?>
                    <?php while ($pecah = $ambil->fetch_assoc()) { ?>
                    <tr>
                        <td><?php echo $nomor; ?></td>
                        <td><?php echo $pecah['nama_pelanggan']; ?></td>
                        <td><?php echo $pecah['email_pelanggan']; ?></td>
                        <td><?php echo $pecah['telp_pelanggan']; ?></td>
                        <td><a href="proses-hapus.php?idp=<?php echo $pecah['id_pelanggan']?>" class="btn-hapus" onclick="return confirm('Yakin Ingin Menghapus ?')">Hapus</a></td>
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

