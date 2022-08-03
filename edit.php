<?php
require_once('./functions.php');

if (isset($_POST['edit'])) {
  if (ubahData($_POST)) {
    setcookie('status', 'alert-success', time() + 2);
    setcookie('msg', 'Siswa Berhasil Diubah', time() + 2);
    header('Location:./');
  } else {
    setcookie('status', 'alert-warning', time() + 2);
    setcookie('msg', 'Siswa Gagal Dihapus', time() + 2);
    header('Location:./');
  }
} else {
  header('Location:./');
}
