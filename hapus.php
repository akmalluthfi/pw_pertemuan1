<?php

require_once('./functions.php');

if (isset($_GET)) {
  if (hapusSiswa($_GET['id'])) {
    echo "
			<script>
				alert ('data berhasil dihapus');
				document.location.href = './'
			</script>
		";
  } else {
    echo "
			<script>
				alert ('data gagal dihapus');
				document.location.href = './'
			</script>
		";
  }
}
