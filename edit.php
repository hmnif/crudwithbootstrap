<?php
include "./function.php";

$id_mhs = $_GET['id_mhs'];
$mahasiswa = tampil_data("SELECT * FROM mahasiswa WHERE id_mhs = $id_mhs")[0];

if (isset($_POST['submit'])) {
  if (edit_mahasiswa($_POST) > 0) {
    echo "<script>alert('Data Berhasil Disimpan')</script>";
    header("Location: index.php");
  } else {
    echo "Error: " . mysqli_error($db);
    header("Location: index.php");
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Mahasiswa</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<div class="p-5">
  <h1>Edit Data Mahasiswa</h1>
  <form action="" method="POST" class="">
    <input type="hidden" name="id_mhs" value="<?php echo $mahasiswa['id_mhs']; ?>">
    <div class="mb-3">
      <label for="nama_mhs" class="form-label">Nama Mahasiswa</label>
      <input type="text" class="form-control" id="nama_mhs" name="nama_mhs" value="<?php echo $nama_mhs['nama_mhs']; ?>">
    </div>
    <div class=" mb-3">
      <label for="prodi" class="form-label">Progragram Studi</label>
      <input type="text" class="form-control" id="prodi" name="prodi" value="<?php echo $prodi['prodi']; ?>">
    </div>
    <div class="mb-3">
      <label for="ipk" class="form-label">IPK</label>
      <input type="text" class="form-control" id="ipk" name="ipk" value="<?php echo $ipk['ipk']; ?>">
    </div>
    <div class="mb-3">
      <label for="semester" class="form-label">Semester</label>
      <select class="form-select" aria-label="Default select example" name="semester" value="<?php echo $semester['semester']; ?>>
        <option value="" selected>Default</option>
        <option value=" 1">1</option>
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
    <button type="submit" class="btn btn-primary" name="submit">Update</button>
  </form>
</div>
</body>

</html>