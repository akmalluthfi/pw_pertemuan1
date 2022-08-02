<?php

$koneksi = mysqli_connect('localhost', 'root', '', 'pw_1');

function ambilSiswa($query)
{
  global $koneksi;
  $hasil = mysqli_query($koneksi, $query);
  $list_siswa = [];
  while ($siswa = mysqli_fetch_assoc($hasil)) {
    $list_siswa[] = $siswa;
  }
  return $list_siswa;
}

function tambahSiswa($data)
{
  global $koneksi;

  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
  $agama = htmlspecialchars($data['agama']);
  $sekolah_asal = htmlspecialchars($data['sekolah_asal']);

  $query = "INSERT INTO siswa VALUES(
    '', '$nama', '$alamat', '$jenis_kelamin', '$agama', '$sekolah_asal'
  )";

  mysqli_query($koneksi, $query);
  if (mysqli_affected_rows($koneksi) > 0) return true;
  return false;
}

function ubahData($data)
{
  global $koneksi;

  $id = $data['id'];
  $nama = htmlspecialchars($data['nama']);
  $alamat = htmlspecialchars($data['alamat']);
  $jenis_kelamin = htmlspecialchars($data['jenis_kelamin']);
  $agama = htmlspecialchars($data['agama']);
  $sekolah_asal = htmlspecialchars($data['sekolah_asal']);

  $query = "UPDATE siswa SET 
              nama = '$nama', 
              alamat = '$alamat', 
              jenis_kelamin = '$jenis_kelamin', 
              agama = '$agama', 
              sekolah_asal = '$sekolah_asal'
            WHERE id = $id
  ";

  mysqli_query($koneksi, $query);
  if (mysqli_affected_rows($koneksi) > 0) return true;
  return false;
}

function hapusSiswa($id)
{
  global $koneksi;
  $query = "DELETE FROM siswa WHERE id=$id";
  mysqli_query($koneksi, $query);

  if (mysqli_affected_rows($koneksi) > 0) return true;
  return false;
}
