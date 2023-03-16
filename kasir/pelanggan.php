<!DOCTYPE html>
<html lang="en">

<head>
  <style>

  
    </style>
<link href="../css/tabelc.css?version=<?= filemtime("../css/tabelc.css")?>" rel="stylesheet">
</head>
<body>
 
  
<?php
$title = 'pelanggan';
require 'functions.php';
require 'navbar.php';
$query = 'SELECT * FROM member';
$data = ambildata($conn,$query);
?> 
                    <div>
                        <a href="pelanggan_tambah.php"><button class="btn2"> Tambah Data</button>
                    </div>
<table>
     <thead>
        <tr>
          <th><label>no </label></th>
          <th><label>Nama</label></th>
          <th><label>alamat</label></th>
          <th><label>jenis kelamin</label></th>
          <th><label>telepon</label></th>
          <th><label>no ktp</label></th>
          <th width="15%"><label>Aksi</label></th>
        </tr>
      </thead>
      <tbody>
      <?php  $no=1; foreach($data as $member): ?>
        <tr class="data-label">
             <td><?= $no++ ?></td>
             <td><?= $member['nama_member'] ?></td>
             <td><?= $member['alamat_member'] ?></td>
             <td><?= $member['jenis_kelamin'] ?></td>
             <td><?= $member['telp_member'] ?></td>
             <td><?= $member['no_ktp'] ?></td>
             <td align="center">
             <a href="pelanggan_edit.php?id=<?= $member['id_member']; ?>" ><button class="button1">edit</button></a>
             <a href="pelanggan_hapus.php?id=<?= $member['id_member']; ?>" onclick="return confirm('Yakin hapus data?');"><button class="button1">hapus</button></a>
                                    </td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>

</body>
