<?php
if(isset($_POST["action"])){
    if($_POST["action"] == "add_data"){
        echo "Tambah Data";
    }
    else if($_POST["action"] == "update_data"){
        echo "Update Data";
    }
}

if(isset($_GET["delete"])){
    echo "Hapus data";
}

?>