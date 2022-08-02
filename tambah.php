<?php
require_once('./functions.php');

if (isset($_POST['submit'])) {
  if (tambahSiswa($_POST)) {
    echo 'Siswa berhasil ditambah';
  } else {
    echo 'Siswa Gagal ditambahkan';
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tambah Data Siswa</title>
</head>

<body>

  <h1>Form tambah data siswa</h1>

  <a href="./">Kembali</a>

  <form action="" method="POST">
    <div>
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama" required>
    </div>
    <div>
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" id="alamat" required>
    </div>
    <div>
      <label>Jenis Kelamin</label>
      <div>
        <input type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki" checked="checked">
        <label for="laki_laki">Laki-Laki</label>
      </div>
      <div>
        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan">
        <label for="perempuan">Perempuan</label>
      </div>
    </div>
    <div>
      <label for="agama">Agama</label>
      <input type="text" name="agama" id="agama" required>
    </div>
    <div>
      <label for="sekolah_asal">Sekolah Asal</label>
      <input type="text" name="sekolah_asal" id="sekolah_asal" required>
    </div>
    <button type="submit" name="submit">Simpan</button>
  </form>

</body>

</html>