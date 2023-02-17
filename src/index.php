<?php
    include 'connection.php';
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
            <a href="manage.php" id="add" class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold inline-flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="20" height="20" viewBox="0 0 24 24" stroke-width="3" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
                <path d="M12 5l0 14" />
                <path d="M5 12l14 0" />
                </svg>&nbsp;Add
            </a>    
            <table class="w-full p-10 mt-2 mb-10">
                <thead class="bg-slate-300 text-center">
                    <tr>
                        <td class="p-2">No</td>
                        <td class="py-2 px-5">Nama</td>
                        <td class="py-2 px-5">Nim</td>
                        <td class="py-2 px-5">Jurusan</td>
                        <td class="py-2 px-5">Action</th>
                    </tr>
                </thead>
                <tbody class="text-center">
                    
                    <?php
                        $i = 1;
                        $sql = mysqli_query($conn, "SELECT * FROM data_mhs");
                        while($result = mysqli_fetch_assoc($sql)){ 
                    ?>
                        <tr class="hover:bg-slate-100">
                            <td class="p-2 text-sm"><?php echo $i; ?></td>
                            <td class="py-2 px-5 text-sm"><?php echo $result['nama']; ?></td>
                            <td class="py-2 px-5 text-sm"><?php echo $result['nim']; ?></td>
                            <td class="py-2 px-5 text-sm"><?php echo $result['jurusan']; ?></td>
                            <td class="py-2 px-5 text-sm"><a href="manage.php?update=1">Edit</a> | <a href="process.php?delete=<?php echo $result['id']; ?>" onclick="return confirm('Apakah anda ingin menghapus?')">Delete</a></td>
                        </tr>
                        <?php $i++ ?>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </section>
</body>
</html>