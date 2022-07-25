<?php 
session_start();
//mendapatkan id_produk dari url
$product_id = $_GET['id'];

// jk sudah ada produk dikeranjang, maka produk itu jumlahnya di+1
if(isset($_SESSION['keranjang'][$product_id]))
{
    $_SESSION['keranjang'][$product_id]+=1;
}
// selain itu (blm ada di keranjang), mk produk itu dianggap dibeli 1
else
{
    $_SESSION['keranjang'][$product_id] = 1;
}

//echo "<pre>";
//print_r($_SESSION);
//echo"</pre>";

//larikan ke halaman keranjang
echo "<script>alert('Produk telah masuk ke keranjang belanja');</script>";
echo "<script>location='keranjang.php';</script>";
?>