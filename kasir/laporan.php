<!DOCTYPE html>
<html lang="en">

<head>
<link href="../css/tabelc.css?version=<?= filemtime("../css/tabelc.css")?>" rel="stylesheet">
</head>
<body>
<?php
$title = 'laporan';
require 'functions.php';
require 'navbar.php';
$bulan = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND MONTH(tgl_pembayaran) = MONTH(NOW())");
$tahun = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND YEAR(tgl_pembayaran) = YEAR(NOW())");
$minggu = ambilsatubaris($conn,"SELECT SUM(total_harga) AS total FROM detail_transaksi INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id WHERE status_bayar = 'dibayar' AND WEEK(tgl_pembayaran) = WEEK(NOW())");


$penjualan = ambildata($conn,"SELECT SUM(detail_transaksi.total_harga) AS total,COUNT(detail_transaksi.paket_id) as jumlah_paket,paket.nama_paket,transaksi.tgl_pembayaran FROM detail_transaksi
INNER JOIN transaksi ON transaksi.id_transaksi = detail_transaksi.transaksi_id
INNER JOIN paket ON paket.id_paket = detail_transaksi.paket_id
WHERE transaksi.status_bayar = 'dibayar' GROUP BY detail_transaksi.paket_id");
?>



<div>
  <a href="cetak.php"><button class="btn2"> cetak</button>
                    </div>
 
<table>
     <thead>
        <tr>
        <th><label>no </label></th>
          <th><label>nama paket</label></th>
          <th><label>jumlah transaksi</label></th>
          <th><label>tanggal transaksi</label></th>
          <th><label>total hasil</label></th>
          
        </tr>
      </thead>
      <tbody>
      <?php $no=1; foreach($penjualan as $transaksi): ?>
        <tr class="data-label">
             <td><?= $no++ ?></td>
            <td><?= $transaksi['nama_paket'] ?></td>
            <td><?= $transaksi['jumlah_paket'] ?></td>
            <td><?= $transaksi['tgl_pembayaran'] ?></td>
            <td><?= $transaksi['total'] ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</body>
                  