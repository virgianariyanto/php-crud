<?php
include 'connection.php';

if(isset($_POST['action'])){
    if($_POST['action'] == 'add_data'){
        
        $nama = $_POST['nama'];
        $nim = $_POST['nim'];
        $jurusan = $_POST['jurusan'];
        $query = mysqli_query($conn, "INSERT INTO data_mhs VALUES('', '$nim', '$nama', '$jurusan')");

        if($query) {
            header('location: index.php');
        }
        else{
            echo "Data gagal ditambahkan";
        }
    }
    else if($_POST['action'] == 'update_data') {
        echo "Update Data";
    }
}

if(isset($_GET['delete'])){

    $id = $_GET['delete'];
    $query = mysqli_query($conn, "DELETE FROM data_mhs WHERE id = '$id'");

    if($query) {
        header('location: index.php');
    }
    else{
        echo "Data gagal dihapus";
    }
}

?>