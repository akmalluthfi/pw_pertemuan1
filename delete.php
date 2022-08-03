<?php

require_once('./functions.php');

if (isset($_GET)) {
	if (hapusSiswa($_GET['id'])) {
		setcookie('status', 'alert-success', time() + 2);
		setcookie('msg', 'Siswa Berhasil Dihapus', time() + 2);
		header('Location:./');
	} else {
		setcookie('status', 'alert-success', time() + 2);
		setcookie('msg', 'Siswa Gagal Dihapus', time() + 2);
		header('Location:./');
	}
}
