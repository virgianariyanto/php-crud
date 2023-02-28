<?php
include 'connection.php';
include 'function.php';

if(isset($_POST['action'])){
    if($_POST['action'] == 'add_data') {
        
        $queryAdd = addData($_POST, $_FILES);

        if($queryAdd) {
            header('location: index.php');
        }
        else{
            echo "Data gagal ditambahkan";
        }
    }
    else if($_POST['action'] == 'update_data') {
        $queryEdit = editData($_POST, $_FILES);

        if($queryEdit) {
            header('location: index.php');
        }
        else{
            echo "Data gagal dirubah";
        }
    }

    else if($_POST['action'] == 'register') {
        $queryAddUsers = addUsers($_POST);

        if($queryAddUsers) {
            header('location: index.php');
        }
        else{
            echo "Data gagal ditambahkan";
        }
    }
}

if(isset($_GET['delete'])){

    $queryDelete = delete($_GET);

    if($queryDelete) {
        header('location: index.php');
    }
    else{
        echo "Data gagal dihapus";
    }
}

// if(isset($_POST['search'])){
//     $keyword = $_POST['keyword'];

//     $querySearch = mysqli_query($conn, "SELECT * FROM data_pekerja WHERE nama = '$keyword'");
//     $result = mysqli_fetch_assoc($querySearch);

//     if($result) {
//         header('location: index.php');
//     }
// }

?>