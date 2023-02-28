<?php

include 'connection.php';

function addData($data, $files) {
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $foto = $files['foto']['name'];

    $dir = "img/";
    $tmpFile = $files['foto']['tmp_name'];
    move_uploaded_file($tmpFile, $dir.$foto);

    $query = mysqli_query($GLOBALS['conn'], "INSERT INTO data_pekerja VALUES('', '$nama', '$alamat', '$foto')");

    return $query;
}

function addUsers($data) {
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);
    $email = strtolower(htmlspecialchars($data["email"]));
    $password = htmlspecialchars($data["password"]);
    $confirm_password = htmlspecialchars($data["confirm_password"]);

    if($password !== $confirm_password){
        echo "password harus sama";
    }

    $query = mysqli_query($GLOBALS['conn'], "INSERT INTO users VALUES('','$nama','$alamat','$email','$password')");

    return $query;
}

function editData($data, $files) {
    $id = $data['id'];
    $nama = htmlspecialchars($data["nama"]);
    $alamat = htmlspecialchars($data["alamat"]);

    $editImg = mysqli_query($GLOBALS['conn'], "SELECT * FROM data_pekerja WHERE id = '$id'");
    $result = mysqli_fetch_assoc($editImg);

    if($files['foto']['name'] == "") {
        $foto = $result['foto'];
    }
    else{
        $foto = $files['foto']['name'];
        unlink("img/".$result['foto']);
        move_uploaded_file($files['foto']['tmp_name'], "img/".$files['foto']['name']);
    }

    $query = mysqli_query($GLOBALS['conn'], "UPDATE data_pekerja SET nama='$nama', alamat='$alamat', foto='$foto' WHERE id = '$id'");

    return $query;
}

function delete($data) {
    $id = $data['delete'];

    // delete file img
    $deleteImg = mysqli_query($GLOBALS['conn'], "SELECT * FROM data_pekerja WHERE id = '$id'");
    $result = mysqli_fetch_assoc($deleteImg);

    unlink("img/".$result['foto']);

    $query = mysqli_query($GLOBALS['conn'], "DELETE FROM data_pekerja WHERE id = '$id'");

    return $query;
}

?>