<?php
include "./function.php";

if (isset($_POST["submit"])) {
  tambah_mahasiswa($_POST);
}

$mahasiswa = tampil_data('SELECT * FROM mahasiswa');

if (isset($_POST["search"])) {
  $mahasiswa = cari_mahasiswa($_POST["cari"]);
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="p-5">
  <h1>Selamat Datang di CRUD Mahasiswa</h1>
  <form action="" method="POST" class="mt-4">
    <div class="mb-3">
      <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
      <input type="text" class="form-control" name="nama_mhs">
    </div>
    <div class="mb-3">
      <label for="prodi" class="form-label">Progragram Studi</label>
      <input type="text" class="form-control" name="prodi">
    </div>
    <div class="mb-3">
      <label for="ipk" class="form-label">IPK</label>
      <input type="text" class="form-control" name="ipk">
    </div>
    <div class="mb-3">
      <label for="semester" class="form-label">Semester</label>
      <select class="form-select" aria-label="Default select example" name="semester">
        <option value="" selected>Default</option>
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
        <option value="5">5</option>
        <option value="6">6</option>
        <option value="7">7</option>
        <option value="8">8</option>
      </select>
    </div>
    <br>
    <button type="submit" class="btn btn-primary" name="submit"><i class="fa fa-plus"></i> Tambah</button>
  </form>
</div>
<hr>
<div class="p-5">
  <h1>Data Mahasiswa</h1>
  <form action="" class="d-flex" method="POST">
    <input type="text" class="form-control" placeholder="Search" name="cari">
    <button class="btn btn-primary ms-2" name="search"><i class="fa fa-search"></i> Cari</button>
  </form>
  <table class="table table-secondary mt-4">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Id</th>
        <th scope="col">Nama Mahasiwa</th>
        <th scope="col">Program Studi</th>
        <th scope="col">IPK</th>
        <th scope="col">Semester</th>
        <th scope="col">Aksi</th>
      </tr>
      <?php $no = 1; ?>
      <?php foreach ($mahasiswa as $row) { ?>
        <tr>
          <td><?php echo $no; ?></td>
          <td><?php echo $row['id_mhs']; ?></td>
          <td><?php echo $row['nama_mhs']; ?></td>
          <td><?php echo $row['prodi']; ?></td>
          <td><?php echo $row['ipk']; ?></td>
          <td><?php echo $row['semester']; ?></td>
          <td>
            <a href="edit.php?id_mhs=<?php echo $row['id_mhs']; ?>"><button class="btn btn-warning text-light"><i class="fa fa-pencil" aria-hidden="true"></i> Edit</button></a>
            <a href="delete.php?id_mhs=<?php echo $row['id_mhs']; ?>"><button class="btn btn-danger ms-2"><i class="fa fa-trash" aria-hidden="true"></i> Hapus</button></a>
          </td>
        </tr>
        <?php $no++; ?>
      <?php } ?>
    </thead>
  </table>
</div>
</body>

</html>