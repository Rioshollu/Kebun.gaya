<?php 
    session_start();
    include 'db.php';
    if($_SESSION['status_login'] != true){
        echo '<script>window.location="login.php"</script>';
    }
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

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Data Product</h3>
            <div class="box">
                <p><a href = "tambah-produk.php">Tambah Data</a></p>
                <table border="1" cellspacing="0" class="tabel">
                    <thead>
                        <tr>
                            <th width= "60px">No</th>
                            <th>Kategori</th>
                            <th>Nama Produk</th>
                            <th>Harga</th>
                            <th>Stok Produk</th>
                            <th>Gambar</th>
                            <th>Status</th>
                            <th width= "140px">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $no = 1;
                            $produk = mysqli_query($conn, "SELECT * FROM tb_product LEFT JOIN tb_category USING (category_id) ORDER BY product_id DESC");
                            if(mysqli_num_rows($produk) > 0){
                            while($row = mysqli_fetch_array($produk)){
                        ?>
                        <tr>
                            <td><?php echo $no++ ?></td>
                            <td><?php echo $row['category_name'] ?></td>
                            <td><?php echo $row['product_name'] ?></td>
                            <td>Rp. <?php echo number_format($row['product_price']) ?></td>
                            <td><?php echo $row['stok_product'] ?></td>
                            <td><a href="produk/<?php echo $row['product_image'] ?>" target="_blank"> <img src="../produk/<?php echo $row['product_image'] ?>" width="60px"> </a></td>
                            <td><?php echo ($row['product_status'] == 0 )? 'Tidak Aktif' : 'Aktif'; ?></td>
                            <td>
                                <a href="edit-produk.php?id=<?php echo $row['product_id']?>" class="btn-edit">Edit</a> <a href="proses-hapus.php?idp=<?php echo $row['product_id']?>" class="btn-hapus" onclick="return confirm('Yakin Ingin Menghapus ?')" >Hapus</a>
                            </td>
                        </tr>
                        <?php }}else{ ?>
                            <tr>
                                <td colspan="8">Tidak ada data</td>
                            </tr>    
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>

<!-- footer -->
    <footer>
        <div class="container">
        <small>Copyright &copy; 2022 - Kebun.Gaya</small>
        </div>
    </footer>
</body>
</html>