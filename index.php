<?php
require_once('functions.php');

// cek apakah user sudah login
// if(isset())

// cek apakah ada keyword pencarian
if (isset($_GET['k']) && !empty($_GET['k'])) {
  $keyword = $_GET['k'];
  $query = "SELECT * FROM siswa WHERE
              nama LIKE '%$keyword%' OR
              alamat LIKE '%$keyword%' OR
              jenis_kelamin LIKE '%$keyword%' OR
              agama LIKE  '%$keyword%' OR 
              sekolah_asal LIKE '%$keyword%'
    ";
  $semua_siswa = ambilSiswa($query);
} else {
  $semua_siswa = ambilSiswa('SELECT * FROM siswa');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="./css/bootstrap.min.css">
  <!-- <link rel="stylesheet" href="css/style.css"> -->

  <title>Data Siswa</title>
</head>

<body>

  <div class="container-lg mt-3">
    <h1 class="mb-3">Data Siswa</h1>

    <?php if (isset($_COOKIE['status'])) : ?>
      <div class="alert <?= $_COOKIE['status'] ?> alert-dismissible fade show" role="alert">
        <?= $_COOKIE['msg'] ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>
    <?php endif;  ?>

    <div class="row justify-content-end">
      <div class="col-auto">
        <button type="button" class="btn btn-outline-success mb-3 me-3" data-bs-toggle="modal" data-bs-target="#addData">
          Tambah Siswa
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col-10 col-sm-9 col-md-8 col-lg-7 col-xl-6 col-xxl-5">
        <form action="" method="GET">
          <div class="input-group mb-3">
            <input name="k" value="<?= $_GET['k'] ?? '' ?>" type="text" class="form-control" placeholder="Cari...">
            <button class="btn btn-outline-primary" type="submit">Cari</button>
          </div>
        </form>
      </div>
    </div>

    <!-- table -->
    <div class="table-responsive">
      <table class="table table-hover table-bordered text-nowrap">
        <thead>
          <tr class="table-primary">
            <th scope="col">#</th>
            <th scope="col">Nama</th>
            <th scope="col">Alamat</th>
            <th scope="col">Jenis Kelamin</th>
            <th scope="col">Agama</th>
            <th scope="col">Sekolah Asal</th>
            <th scope="col">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php if (empty($semua_siswa)) : ?>
            <tr>
              <td colspan="7">
                <h4 class="text-center">Data tidak ditemukan!</h4>
              </td>
            </tr>
          <?php else : ?>
            <?php foreach ($semua_siswa as $i => $siswa) : ?>
              <tr>
                <th scope="row"><?= $i + 1; ?></th>
                <td class="text-nowrap data-nama"><?= $siswa['nama']; ?></td>
                <td class="text-nowrap data-alamat"><?= $siswa['alamat']; ?></td>
                <td class="text-nowrap data-jenis-kelamin"><?= $siswa['jenis_kelamin']; ?></td>
                <td class="text-nowrap data-agama"><?= $siswa['agama']; ?></td>
                <td class="text-nowrap data-sekolah-asal"><?= $siswa['sekolah_asal']; ?></td>
                <td class="text-nowrap">
                  <button type="button" class="btn btn-sm btn-primary btn-editData" data-bs-toggle="modal" data-bs-target="#editData" data-id="<?= $siswa['id'] ?>">
                    Ubah
                  </button>
                  <button type="button" class="btn btn-sm btn-danger btn-confirmDelete" data-bs-toggle="modal" data-bs-target="#confirmDelete" data-id="<?= $siswa['id'] ?>">
                    Hapus
                  </button>
                </td>
              </tr>
            <?php endforeach;  ?>
          <?php endif;  ?>
        </tbody>
      </table>
    </div>
  </div>

  <!-- Modal Confirm Hapus Data -->
  <div class="modal fade" id="confirmDelete" tabindex="-1" aria-labelledby="confirmDeleteLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="confirmDeleteLabel">Konfirmasi Hapus Data</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Apakah anda yakin mau menghapus data?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <a class="btn btn-danger" href="./delete.php?id=<?= $siswa['id'] ?>">Hapus Data</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Modal Edit Data -->
  <div class="modal fade" id="editData" tabindex="-1" aria-labelledby="editDataLabel" aria-hidden="true" data-bs-backdrop="static" data-bs-keyboard="false">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="edit.php" method="POST">
          <input type="hidden" name="id">
          <div class="modal-header">
            <h5 class="modal-title" id="editDataLabel">Ubah Data Siswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="edit-nama" class="form-label">Nama</label>
              <input name="nama" type="text" class="form-control" id="edit-nama" required>
            </div>
            <div class="mb-3">
              <label for="edit-alamat" class="form-label">Alamat</label>
              <input name="alamat" type="text" class="form-control" id="edit-alamat" required>
            </div>
            <div class="mb-3">
              <label for="edit-alamat" class="form-label d-block">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="edit-laki-laki" value="Laki-Laki">
                <label class="form-check-label" for="edit-laki-laki">
                  Laki - Laki
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="edit-perempuan" value="Perempuan">
                <label class="form-check-label" for="edit-perempuan">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="edit-agama" class="form-label">Agama</label>
              <select class="form-select" name="agama" id="edit-agama">
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="edit-sekolah-asal" class="form-label">Sekolah Asal</label>
              <input name="sekolah_asal" type="text" class="form-control" id="edit-sekolah-asal" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button name="edit" type="submit" class="btn btn-primary">Ubah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <!-- Modal Add Data -->
  <div class="modal fade" id="addData" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addDataLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <form action="add.php" method="POST">
          <div class="modal-header">
            <h5 class="modal-title" id="addDataLabel">Tambah Data Siswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="mb-3">
              <label for="add-nama" class="form-label">Nama</label>
              <input name="nama" type="text" class="form-control" id="add-nama" required>
            </div>
            <div class="mb-3">
              <label for="add-alamat" class="form-label">Alamat</label>
              <input name="alamat" type="text" class="form-control" id="add-alamat" required>
            </div>
            <div class="mb-3">
              <label for="add-alamat" class="form-label d-block">Jenis Kelamin</label>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="add-laki-laki" value="Laki-Laki" checked>
                <label class="form-check-label" for="add-laki-laki">
                  Laki - Laki
                </label>
              </div>
              <div class="form-check form-check-inline">
                <input class="form-check-input" type="radio" name="jenis_kelamin" id="add-perempuan" value="Perempuan">
                <label class="form-check-label" for="add-perempuan">
                  Perempuan
                </label>
              </div>
            </div>
            <div class="mb-3">
              <label for="add-agama" class="form-label">Agama</label>
              <select class="form-select" name="agama">
                <option selected disabled hidden>-- Pilih salah satu --</option>
                <option value="Islam">Islam</option>
                <option value="Kristen">Kristen</option>
                <option value="Katolik">Katolik</option>
                <option value="Hindu">Hindu</option>
                <option value="Buddha">Buddha</option>
                <option value="Konghucu">Konghucu</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="add-sekolah-asal" class="form-label">Sekolah Asal</label>
              <input name="sekolah_asal" type="text" class="form-control" id="add-sekolah-asal" required>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button name="add" type="submit" class="btn btn-primary">Tambah Data</button>
          </div>
        </form>
      </div>
    </div>
  </div>

  <script src="./js/bootstrap.bundle.min.js"></script>
  <script src="./js/script.js?clear=<?= time() ?>"></script>
</body>

</html>