<?php
include "./connect.php";

function tambah_mahasiswa($data)
{
  global $db;
  $nama_mhs = $data["nama_mhs"];
  $prodi = $data["prodi"];
  $ipk = $data["ipk"];
  $semester = $data["semester"];

  // $query = mysqli_query($db, "INSERT INTO mahasiswa VALUES (NULL, '$nama_mhs', '$prodi', $ipk, $semester)");
  $query = mysqli_query($db, "INSERT INTO mahasiswa (nama_mhs, prodi, ipk, semester) VALUES ('$nama_mhs', '$prodi', $ipk, $semester)");

  if ($query) {
    echo "<script>alert('Data Berhasil Disimpan')</script>";
  } else {
    echo "Error: " . mysqli_error($db);
  }
}
function tampil_data($query)
{
  global $db;
  $result = mysqli_query($db, $query);
  $rows = [];
  while ($row = mysqli_fetch_assoc($result)) {
    $rows[] = $row;
  }
  return $rows;
}

function delete_mahasiswa($id_mhs)
{
  global $db;
  $query = "DELETE FROM mahasiswa WHERE id_mhs = '$id_mhs'";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function edit_mahasiswa($data)
{
  global $db;
  $id_mhs = $data['id_mhs'];
  $nama_mhs = $data['nama_mhs'];
  $prodi = $data['prodi'];
  $ipk = $data['ipk'];
  $semester = $data["semester"];

  $query = "UPDATE mahasiswa SET nama_mhs = '$nama_mhs', prodi = '$prodi', ipk = '$ipk', semester = '$semester' WHERE id_mhs = '$id_mhs'";
  mysqli_query($db, $query);
  return mysqli_affected_rows($db);
}

function cari_mahasiswa($cari)
{
  global $db;
  $query = "SELECT * FROM mahasiswa WHERE nama_mhs LIKE '%$cari%' OR prodi LIKE '%$cari%' OR ipk LIKE '%$cari%' OR semester LIKE '%$cari%' OR id_mhs LIKE '%$cari%'";
  return tampil_data($query);
}
