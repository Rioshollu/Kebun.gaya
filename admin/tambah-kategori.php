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
            <h3>Tambah Data Kategori</h3>
            <div class="box">
                <form action="" method="POST">
                    <input type="text" name="nama" placeholder="Nama Kategori"  class="input-control"  required>
                    <input type="submit" name="submit" value="Submit" class="btn">
                </form>
                <?php
                    if(isset($_POST['submit'])){

                        $nama = ucwords($_POST['nama']);

                        $insert = mysqli_query($conn,"INSERT INTO tb_category VALUES (null,'".$nama."')");

                        if($insert){
                            echo'<script>alert("Tambah Data Berhasil")</script>';
                            echo'<script>window.location="data-kategori.php"</script>';
                        }else{
                            echo'gagal'.mysqli_error($conn);
                        }
                    }
                ?>
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