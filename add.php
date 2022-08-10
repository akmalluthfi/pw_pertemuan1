<?php

require_once('./functions.php');

if (isset($_POST['add'])) {
  if (tambahSiswa($_POST)) {
    setcookie('status', 'alert-success', time() + 2);
    setcookie('msg', 'Siswa Berhasil Ditambahkan', time() + 2);
    header('Location:./');
  } else {
    setcookie('status', 'alert-warning', time() + 2);
    setcookie('msg', 'Siswa Gagal Ditambahkan', time() + 2);
    header('Location:./');
  }
} else {
  header('Location:./');
}
