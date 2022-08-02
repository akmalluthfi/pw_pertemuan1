<?php
require_once('./functions.php');

if (isset($_GET['id'])) {
  $id = $_GET['id'];
  $siswa = ambilSiswa("SELECT * FROM siswa WHERE id=$id")[0];
  // var_dump($siswa);
  // die();
}

if (isset($_POST['submit'])) {
  if (ubahData($_POST)) {
    header('Location:./');
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ubah Data Siswa</title>
</head>

<body>

  <h1>Data Siswa : <?= $siswa['nama']; ?></h1>

  <a href="./">Kembali</a>

  <form action="" method="POST">
    <input type="hidden" name="id" value="<?= $siswa['id'] ?>">
    <div>
      <label for="nama">Nama</label>
      <input type="text" name="nama" id="nama" value="<?= $siswa['nama'] ?>" required>
    </div>
    <div>
      <label for="alamat">Alamat</label>
      <input type="text" name="alamat" id="alamat" value="<?= $siswa['alamat'] ?>" required>
    </div>
    <div>
      <label>Jenis Kelamin</label>
      <div>
        <input type="radio" name="jenis_kelamin" id="laki_laki" value="Laki-Laki" <?= $siswa['jenis_kelamin'] == 'Laki-Laki' ? 'checked' : '' ?>>
        <label for="laki_laki">Laki-Laki</label>
      </div>
      <div>
        <input type="radio" name="jenis_kelamin" id="perempuan" value="Perempuan" <?= $siswa['jenis_kelamin'] == 'Perempuan' ? 'checked' : '' ?>>
        <label for="perempuan">Perempuan</label>
      </div>
    </div>
    <div>
      <label for="agama">Agama</label>
      <input type="text" name="agama" id="agama" value="<?= $siswa['agama'] ?>" required>
    </div>
    <div>
      <label for="sekolah_asal">Sekolah Asal</label>
      <input type="text" name="sekolah_asal" id="sekolah_asal" value="<?= $siswa['sekolah_asal'] ?>" required>
    </div>
    <button type="submit" name="submit">Simpan</button>
  </form>
</body>

</html>