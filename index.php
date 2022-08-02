<?php
require_once('functions.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="css/style.css">

  <title>Data Siswa</title>
</head>

<body>

  <h1>Data Siswa</h1>

  <a href="./tambah.php">Tambah Siswa</a>

  <table class="table">
    <thead>
      <tr>
        <th>NO</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Jenis Kelamin</th>
        <th>Agama</th>
        <th>Sekolah Asal</th>
        <th colspan="2">Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach (ambilSiswa('SELECT * FROM siswa') as $i => $siswa) : ?>
        <tr>
          <td><?= $i + 1; ?></td>
          <td><?= $siswa['nama']; ?></td>
          <td><?= $siswa['alamat']; ?></td>
          <td><?= $siswa['jenis_kelamin']; ?></td>
          <td><?= $siswa['agama']; ?></td>
          <td><?= $siswa['sekolah_asal']; ?></td>
          <td><a href="./ubah.php?id=<?= $siswa['id'];  ?>">Ubah Data</a> | </td>
          <td><a href="./hapus.php?id=<?= $siswa['id'];  ?>" onclick="confirm('Apakah anda ingin menghapus data?')">Hapus Data</a></td>
        </tr>
      <?php endforeach;  ?>
    </tbody>
  </table>

</body>

</html>