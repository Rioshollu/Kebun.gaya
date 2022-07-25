<?php 
session_start();
include 'db.php';

$semuadata=array();
$tgl_mulai="-";
$tgl_akhir="-";

if (isset($_POST["kirim"])){
    $tgl_mulai = $_POST["tglm"];
    $tgl_akhir = $_POST["tgla"];
    $ambil = $conn->query("SELECT * FROM tb_pembelian pm LEFT JOIN tb_pelanggan pl ON
    pm.id_pelanggan = pl.id_pelanggan WHERE tgl_pembelian BETWEEN '$tgl_mulai' AND '$tgl_akhir' ORDER BY id_pembelian DESC");
    while($pecah = $ambil->fetch_assoc()){
        $semuadata[]=$pecah;
    }
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
<link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
</head>
<body>
 
<!-- header -->
<?php include 'menu.php'; ?>
<div class="section">
    <div class="container">
        <h3>Laporan Pembelian</h3>
        <div class="box">
        <form method="post">
            <div class="row2">
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Mulai</label>
                        <input type="date" class="input-control" name="tglm" value="<?php echo $tgl_mulai ?>">
                    </div>
                </div>
                <div class="col-md-5">
                    <div class="form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="input-control" name="tgla" value="<?php echo $tgl_akhir ?>">
                    </div>
                </div>
                <div class="col-md-5">
                    <label>&nbsp;</label>
                    <button class="btn-1" name="kirim">Lihat</button>
                </div>
            </div>
        </form>

        <table border="1" cellspacing="0" class="tabel">
            <thead>
                <tr>
                  <th>No</th>
                  <th>Nama Pelanggan</th>
                  <th>Tanggal</th>
                  <th>Jumlah</th>
                  <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php $total=0; ?>
                <?php foreach ($semuadata as $key => $value): ?>
                <?php $total+=$value['total_pembelian']; ?>
                <tr>
                    <td><?php echo $key+1; ?></td>
                    <td><?php echo $value['nama_pelanggan']; ?></td>
                    <td><?php echo $value['tgl_pembelian']; ?></td>
                    <td>Rp. <?php echo number_format($value['total_pembelian']); ?></td>
                    <td><?php echo $value['status_pembelian']; ?></td>
                </tr>
                <?php endforeach ?>
            </tbody>
            <tfoot>
                <tr>
                    <th colspan="3">Total</th>
                    <th class="total">Rp. <?php echo number_format($total)?></th>
                    <th></th>
                </tr>
            </tfoot>
        </table>    
        </div>
    </div>
</div>
</body>
</html>