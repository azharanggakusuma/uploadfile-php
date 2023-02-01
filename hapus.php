<?php
    include "koneksi.php";

    if(isset($_GET['id_teman'])){
        $sql_delete = "DELETE FROM tb_teman WHERE id_teman = " . $_GET['id_teman'];

        mysqli_query($con, $sql_delete);
        header("location:index.php");
    }
?>