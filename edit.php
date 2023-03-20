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
    <title>Halaman Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center mt-5 fw-bold">Ubah Data</h2>

        <?php
            if(isset($_GET['id_teman'])){
                $sql = "SELECT * FROM tb_teman WHERE id_teman = " . $_GET['id_teman'];

                $dataTeman = mysqli_query($con, $sql);
                $data = mysqli_fetch_array($dataTeman);
        ?>

        <form action="edit.php" method="post" class="mt-5">
            <div class="mb-3 ">
                <label for="exampleFormControlInput1" class="form-label">NAMA</label>
                <input type="text" class="form-control" id="exampleFormControlInput1" name="nama" value="<?php echo $data['nama_teman']; ?>">
            </div>

            <div class="mb-3 ">
                <label for="exampleFormControlInput2" class="form-label">NIM</label>
                <input type="text" class="form-control" id="exampleFormControlInput2" name="nim" value="<?php echo $data['nim_teman']; ?>">
            </div>

            <div class="mb-3">
                <label class="form-label" for="customFile">UPLOAD FOTO</label>
                <input type="file" class="form-control" id="customFile" name="file" style="border: 2px solid grey; box-shadow: none;">
                <p class="mt-2 text-danger fw-bold fst-italic">Apabila tidak ingin mengubah foto. Bisa lewati saja. Terima Kasih :)</p>
            </div>

            <input type="hidden" name="id" value="<?php echo $data['id_teman']; ?>">

            <div class="text-center">
                <input type="submit" value="  Ubah  " class="btn btn-warning"> &nbsp; <a href="index.php" class="btn btn-danger">Kembali</a>
            </div>
        </form>

        <?php
            }
            else{
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];
                $id = $_POST['id'];

                $sql_update = "UPDATE tb_teman SET nama_teman = '$nama', nim_teman = '$nim' WHERE id_teman = '$id'";

                mysqli_query($con, $sql_update);
                header("location:index.php");
            }
        ?>
    </div>
</body>
</html>