

<!DOCTYPE html>
<html lang="en">

<head>
<link href="../css/tabelc.css?version=<?= filemtime("../css/tabelc.css")?>" rel="stylesheet">
</head>
<body>
<?php
$title = 'dashboard';
require 'functions.php';
require 'navbar.php';
$jTransaksi = ambilsatubaris($conn,'SELECT COUNT(id_transaksi) as jumlahtransaksi FROM transaksi');
$jPelanggan = ambilsatubaris($conn,'SELECT COUNT(id_member) as jumlahmember FROM member');
$joutlet = ambilsatubaris($conn,'SELECT COUNT(id_outlet) as jumlahoutlet FROM outlet');
$query = "SELECT transaksi.*,member.nama_member , detail_transaksi.total_harga FROM transaksi INNER JOIN member ON member.id_member = transaksi.member_id INNER JOIN detail_transaksi ON detail_transaksi.transaksi_id = transaksi.id_transaksi   ORDER BY transaksi.id_transaksi DESC LIMIT 10";
$data = ambildata($conn,$query);
?> 

<table>
     <thead>
        <tr>
        <th><label>no </label></th>
          <th><label>Invoice</label></th>
          <th><label>member</label></th>
          <th><label>status</label></th>
          <th><label>pembayaran</label></th>
          <th><label>total harga</label></th>
          <th width="15%"><label>Aksi</label></th>
        </tr>
      </thead>
      <tbody>
      <?php $no=1; foreach($data as $transaksi): ?>
        <tr class="data-label">
             <td><?= $no++ ?></td>
            <td><?= $transaksi['kode_invoice'] ?></td>
            <td><?= $transaksi['nama_member'] ?></td>
            <td><?= $transaksi['status'] ?></td>
            <td><?= $transaksi['status_bayar'] ?></td>
            <td><?= $transaksi['total_harga'] ?></td>
             <td width="15%"> <a href="transaksi_detail.php?id=<?= $transaksi['id_transaksi']; ?>"><button class="button1">detail</button></td>
           
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
</body>
