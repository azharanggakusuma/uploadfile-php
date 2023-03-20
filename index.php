<?php
    include "koneksi.php";

    $sql = "SELECT * FROM tb_teman";
    $dataTeman = mysqli_query($con, $sql);
?>

<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="img/favicon.ico">
    <title>Halaman Utama</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="styles/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg p-2 shadow fixed-top" style="background-color: var(--bs-body-bg);" id="mainNav">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">RANGGA <span class="dot"></span></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto ">
                    <li class="nav-item">
                    <a class="nav-link mx-2 disabled" aria-current="page" href="#home">Home</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mx-2 disabled" href="#about">About</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mx-2 disabled" href="#project">Project</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link mx-2 disabled" href="#contact">Contact</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a class="nav-link mx-2 dropdown-toggle disabled" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Task
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <li><a class="dropdown-item" href="#">Login System</a></li>
                        <li><a class="dropdown-item" href="#">CRUD Mahasiswa</a></li>
                        <li><a class="dropdown-item" href="#">File Upload</a></li>
                    </ul>
                    </li>
                </ul>
                <ul class="navbar-nav ms-auto d-none d-lg-inline-flex">
                    <li class="nav-link dropdown">
                        <button class="btn nav-link dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="bi bi-sun-fill theme-icon-active" data-theme-icon-active="bi-sun-fill"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="light">
                                    <i class="bi bi-sun-fill me-2 opacity-50" data-theme-icon="bi-sun-fill"></i>
                                    Light
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="dark">
                                    <i class="bi bi-moon-fill me-2 opacity-50" data-theme-icon="bi-moon-fill"></i>
                                    Dark
                                </button>
                            </li>
                            <li>
                                <button class="dropdown-item d-flex align-items-center" type="button" data-bs-theme-value="auto">
                                    <i class="bi bi-circle-half me-2 opacity-50" data-theme-icon="bi-circle-half"></i>
                                    Auto
                                </button>
                            </li>
                        </ul>
                    </li>
                    <li class="nav-link">
                        <a class="btn btn-warning btn-sm mt-1 rounded-4" href="#" role="button"><i class="bi bi-github"></i> Github</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <br><br><br>

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
                        <a href='hapus.php?id_teman="<?php echo $data['id_teman']; ?>"' class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_hapus"><i class="bi bi-trash"></i></a>
                        <a href='edit.php?id_teman="<?php echo $data['id_teman']; ?>"' class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#Modal_edit"><i class="bi bi-pencil-square"></i></a>
                    </td>
                </tr>
            </tbody>

            <?php
                }
            ?>
        </table>

        <!-- Modal -->
        <div class="modal fade" id="Modal_hapus" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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

        <div class="modal fade" id="Modal_edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <i class="bi-exclamation-triangle-fill"></i> &nbsp;
                        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        Apakah kamu ingin mengubahnya?
                    </div>
                    <div class="modal-footer">
                        <a href='edit.php?id_teman="<?php echo $data['id_teman']; ?>"' class="btn btn-warning">Ubah</a>
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

    <script src="js/color_mode.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/c8e4d183c2.js" crossorigin="anonymous"></script>
</body>
</html>