<?php
    include "koneksi.php";

    $sql = "SELECT * FROM tb_teman";
    $dataTeman = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Halaman Utama</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>

    <div class="container">
        <h1 class="text-center mt-5">Tabel Teman</h1>

        <?php
            if($_POST){
                $nama = $_POST['nama'];
                $nim = $_POST['nim'];

                // Upload file dan menyimpannya ke dalam folder
                $file_tmp = $_FILES['file']['tmp_name'];
                $uploads_dir = "upload";
                $nama_file = pathinfo($_FILES['file']['name'], PATHINFO_FILENAME);
                $extension = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);

                $increment = 0;
                $pname = $nama_file . '.' . $extension;
                while(is_file($uploads_dir . '/' . $pname)){
                    $increment++;
                    $pname = $nama_file . $increment . '/' . $extension;
                }

                move_uploaded_file($file_tmp, $uploads_dir.'/'.$pname);

                $tambah_data = "INSERT INTO tb_teman (nama_teman, nim_teman, photo) VALUES ('$nama', '$nim', '$pname')";

                mysqli_query($con, $tambah_data);
                header("location:index.php");
            }
        ?>

        <form method="get" action="#tabel" id="tabel">
            <input type="text" class="form-control mt-5" placeholder="Silahkan cari data berdasarkan nama" name="cari">
        </form>

        <table class="table table-dark table-hover table-bordered table-responsive border-light mt-4">
            <thead>
                <tr class="text-center">
                    <th>NO</th>
                    <th>NAMA</th>
                    <th>NIM</th>
                    <th>FOTO</th>
                    <th>AKSI</th>
                </tr>
            </thead>

            <?php
                $no = 1;
                if(isset($_GET['cari'])){
                    $dataTeman = mysqli_query($con, "SELECT * FROM tb_teman  WHERE nama_teman LIKE '%" . $_GET['cari'] . "%'");
                    echo "<div class='mt-3 fw-bold alert alert-info text-dark'><i class='bi-info-circle-fill'></i></i><strong class='mx-2'>Info!</strong> Hasil Pencarian : " . $_GET['cari'] . "</div>";
                }

                foreach($dataTeman as $data){
            ?>

            <tbody>
                <tr>
                    <td class="text-center"><?php echo $no++ ?></td>
                    <td><?php echo $data['nama_teman']; ?></td>
                    <td class="text-center"><?php echo $data['nim_teman']; ?></td>
                    <td class="text-center"><img width="33px" src="upload/<?php echo $data['photo']; ?>" alt=""></td>
                    <td class="text-center">
                        <a href='hapus.php?id_teman="<?php echo $data['id_teman']; ?>"' class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-trash"></i></a>
                        <a href='hapus.php?id_teman="<?php echo $data['id_teman']; ?>"' class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-exclamation-triangle-fill"></i></a>
                    </td>
                </tr>
            </tbody>

            <?php
                }
            ?>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="bi-exclamation-triangle-fill"></i> &nbsp;
                        <h5 class="modal-title" id="exampleModalLabel">Hapus Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu ingin menghapusnya?
                    </div>
                    <div class="modal-footer">
                        <a href='hapus.php?id_teman="<?php echo $data['id_teman']; ?>"' class="btn btn-danger">Hapus</a>
                        <a href="" class="btn btn-primary" data-bs-dismiss="modal">Batal</a>
                    </div>
                </div>
            </div>
        </div>

        <div class="text-center">
            <a href="tambah.php" class="btn btn-success btn-sm mt-3 mb-5"><i class="bi bi-plus-circle-fill"></i> Tambah</a>
        </div>
    </div>

    <footer class="bg-dark text-center text-white" id="kontak">
        <div class="container p-4 pb-0">
            <section class="mb-4">
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="https://wa.me/+62895364527280" role="button" target="_blank"><i class="fab fa-whatsapp"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="https://instagram.com/azharangga_kusuma" role="button" target="_blank"><i class="fab fa-instagram"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="https://www.linkedin.com/in/azharangga-kusuma-9a30911a0" role="button" target="_blank"><i class="fab fa-linkedin-in"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="https://www.github.com/azharanggakusuma" role="button" target="_blank"><i class="fab fa-github"></i></a>
                <a class="btn btn-outline-light btn-floating m-1 rounded-circle" href="https://youtube.com/channel/UCnKjszzhKbvQ9zqbo9kKjpg" role="button" target="_blank"><i class="fab fa-youtube"></i></a>
            </section>
        </div>
        <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
            <?php echo date('Y'); ?> - <a class="text-white" style="text-decoration: none;" href="#">Azharangga Kusuma</a>
        </div>
    </footer>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.min.js" integrity="sha384-IDwe1+LCz02ROU9k972gdyvl+AESN10+x7tBKgc9I5HFtuNz0wWnPclzo6p9vxnk" crossorigin="anonymous"></script>
    <script src="script/main.js"></script>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</body>
</html>