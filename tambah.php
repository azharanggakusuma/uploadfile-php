<?php
    include "koneksi.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Halaman Tambah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h1 class="text-center mt-5 fw-bold">Tambah Data</h1>

        <form action="index.php" method="post" class="mt-5" enctype="multipart/form-data">
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" placeholder="Silahkan masukkan nama">
            </div>

            <div class="mb-3 ">
                <label for="exampleFormControlInput2" class="form-label">NIM</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="nim" placeholder="Silahkan masukkan nim">
            </div>

            <div class="mb-3">
                <label class="form-label" for="customFile">UPLOAD FOTO</label>
                <input type="file" class="form-control" id="customFile" name="file" style="border: 2px solid grey; box-shadow: none;">
            </div>

            <div class="text-center">
                <input type="submit" value="Tambah" class="btn btn-success"> &nbsp; <a href="index.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>
    </div>
</body>
</html>