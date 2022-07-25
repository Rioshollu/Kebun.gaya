<?php 
    session_start();
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
 
<?php include 'menu.php'; ?>

    <!-- content -->
    <div class="section">
        <div class="container">
            <h3>Dashboard</h3>
            <div class="box">
            <h4>Selamat Datang <?php echo $_SESSION['a_global']->admin_name ?> di Toko Kebun.Gaya</h4>
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