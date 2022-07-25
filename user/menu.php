<header>
    <div class="container">
        <h1>Kebun.Gaya</h1>
            <ul>
                <li><a href="../index.php">Beranda</a><li> 
                <li><a href="produk.php">Produk</a><li>
                <li><a href="perawatan.php">Tips Perawatan</a></li> 
                <li><a href="keranjang.php">Keranjang</a><li>
                <li><a href="checkout.php">Checkout</a><li>
                <!-- jk sudah login(ada session pelanggan)-->
                <?php if (isset($_SESSION["pelanggan"])): ?>
                    <li><a href="riwayat.php">Riwayat Belanja</a></li>
                    <li><a href="logout.php">Logout</a></li>
                <!-- selain itu(blm login||blm ada session pelanggan)-->
                <?php else: ?>
                    <li><a href="login.php">Login</a></li>
                <?php endif ?>
                <?php ?>
                 
            </ul>
    </div>         
</header>