<?php
    include 'connection.php';

    $sql = mysqli_query($conn, "SELECT * FROM data_pekerja ORDER BY id desc");
    if(isset($_POST['search'])){
        $keyword = $_POST['keyword'];
        $sql = mysqli_query($conn, "SELECT * FROM data_pekerja WHERE nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%'");
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>PHP CRUUD</title>
</head>
<body>
    <section class="w-full h-screen flex justify-center">
        <div class="w-1/2 mt-28">
            <div class="w-full text-center mb-8">
                <h1 class="text-xl font-bold text-slate-600">PHP CRUD</h1>
            </div>
            <div class="w-full flex gap-x-1">
                <form action="" method="post" class="flex gap-x-1">
                    <input type="text" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" id="" name="keyword" placeholder="Search.." autofocus />
                    <button name="search" class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold inline-flex items-center" type="submit" onclick="location.href='manage.php';" id="add">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="20" height="20" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                        <path d="M10 10m-7 0a7 7 0 1 0 14 0a7 7 0 1 0 -14 0" />
                        <path d="M21 21l-6 -6" />
                        </svg>&nbsp;Cari
                    </button>
                </form>
                <button class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold inline-flex items-center" type="submit" onclick="location.href='manage.php';" id="add">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                    <path d="M12 5l0 14" />
                    <path d="M5 12l14 0" />
                    </svg>&nbsp;Add
                </button>
            </div>
            <table class="w-full p-10 mt-2 mb-10">
                <thead class="bg-slate-300 text-center">
                    <tr>
                        <td class="p-2">No</td>
                        <td class="py-2 px-5">Nama</td>
                        <td class="py-2 px-5">Alamat</td>
                        <td class="py-2 px-5">Foto</td>
                        <td class="py-2 px-5">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    
                    <?php
                        $i = 1;
                        
                        while($result = mysqli_fetch_assoc($sql)){ 
                    ?>
                        <tr class="hover:bg-slate-100">
                            <td class="p-2 text-sm"><?php echo $i; ?></td>
                            <td class="py-2 px-5 text-sm"><?php echo $result['nama']; ?></td>
                            <td class="py-2 px-5 text-sm"><?php echo $result['alamat']; ?></td>
                            <td class=""><img src="img/<?php echo $result['foto']; ?>" alt="" class="w-20 mx-auto"></td>
                            <td class="py-2 px-5 text-sm"><a href="manage.php?update=<?php echo $result['id']; ?>">Edit</a> | <a href="process.php?delete=<?php echo $result['id']; ?>" onclick="return confirm('Apakah anda ingin menghapus?')">Delete</a></td>
                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>