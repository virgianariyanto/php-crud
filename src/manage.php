<?php
session_start();

if(!isset($_SESSION['login'])) {
    header('location: login.php');
    exit;
}

include 'connection.php';

if(isset($_GET['update'])){
$id = $_GET['update'];

$sql = mysqli_query($conn, "SELECT * FROM data_pekerja WHERE id = '$id'");
$result = mysqli_fetch_assoc($sql);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body>
    <form action="process.php" method="POST" class="w-full h-screen flex justify-center items-center" enctype="multipart/form-data">
        <div class="w-1/2 grid gap-y-6" id="form-input">
            <div class="flex justify-center">    
                <h1 class="text-xl font-bold text-slate-700">Update Data Mahasiswa</h1>
            </div>
            <input type="hidden" value="<?php if(isset($_GET['update'])){ echo $result['id']; }  ?>" name="id" />
            <div>
                <label for="first_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="nama" value="<?php if(isset($_GET['update'])){ echo $result['nama']; }  ?>" required>
            </div>
            <div>
                <label for="last_name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alamat</label>
                <input type="text" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="alamat" value="<?php if(isset($_GET['update'])){ echo $result['alamat']; }  ?>" required>
            </div>
            <div>
                <label for="company" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Foto</label>
                <input type="file" id="company" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="foto" value="" accept="image/*" <?php if(isset($_GET['update'])){ echo "required"; } ?>>
            </div>
            <div>
                <?php if(isset($_GET['update'])){ ?>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold" name="action" value="update_data">
                        Update
                    </button>
                <?php } else {?>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold" name="action" value="add_data">
                        Submit
                    </button>
                <?php } ?>
            </div> 
        </div>
    </form>
</body>
</html>