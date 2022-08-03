<?php
require_once('./functions.php');

if (isset($_POST['submit'])) {
  if (tambahSiswa($_POST)) {
    setcookie('status', 'alert-success', time() + 60);
    setcookie('msg', 'Siswa Berhasil Ditambahkan', time() + 60);
    header('Location:./');
  } else {
    setcookie('status', 'alert-warning', time() + 60);
    setcookie('msg', 'Siswa Gagal Ditambahkan', time() + 60);
    header('Location:./');
  }
}
