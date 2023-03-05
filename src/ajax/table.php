<?php
include '../connection.php';

$keyword = $_GET['keyword'];

$sql = mysqli_query($conn, "SELECT * FROM data_pekerja WHERE nama LIKE '%$keyword%' OR alamat LIKE '%$keyword%'")
?>

<table class="w-full p-10 mt-2 mb-10" id="table">
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