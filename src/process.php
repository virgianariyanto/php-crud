<?php
session_start();

include 'connection.php';
include 'function.php';

if(isset($_POST['action'])){
    if($_POST['action'] == 'add_data') {
        
        $queryAdd = addData($_POST, $_FILES);

        if($queryAdd) {
            $_SESSION['notifadd'] = true;
            header('location: index.php');
        }
        else{
            echo "Data gagal ditambahkan";
        }
    }
    else if($_POST['action'] == 'update_data') {
        $queryEdit = editData($_POST, $_FILES);

        if($queryEdit) {
            $_SESSION['notifedit'] = true;
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
    }
}

if(isset($_GET['delete'])){

    $queryDelete = delete($_GET);

    if($queryDelete) {
        $_SESSION['notifdelete'] = true;
        header('location: index.php');
    }
    else{
        echo "Data gagal dihapus";
    }
}

?>