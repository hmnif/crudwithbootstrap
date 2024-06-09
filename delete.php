<?php
include "./function.php";

if (delete_mahasiswa($_GET['id_mhs']) > 0) {
  echo "<script>alert('Data Berhasil Didelete')</script>";
  header("Location: index.php");
} else {
  echo "<script>alert('Data Gagal Didelete')</script>";
  header("Location: index.php");
}
