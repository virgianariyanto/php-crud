<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Document</title>
</head>
<body class="flex justify-center items-center h-screen">
    <section class="w-[35%] h-auto py-8 shadow-xl rounded-lg">
        <form action="process.php" method="POST" class="w-5/6 mx-auto">
            <h1 class="text-xl text-slate-600 font-semibold text-center">Register</h1>
            <div class="w-full h-8 my-4 flex items-center justify-center bg-red-500 rounded-lg hidden" id="validate">
                <h1 class="text-white">Password Salah</h1>
            </div>
            <div class="mb-6 mt-4">
                <label for="nama" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Nama</label>
                <input type="text" id="nama" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="nama" value="" autofocus required>
            </div>
            <div class="mb-6 mt-4">
                <label for="alamat" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Alamat</label>
                <input type="text" id="alamat" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="alamat" value="" required>
            </div>
            <div class="mb-6 mt-4">
                <label for="email" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Email</label>
                <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="email" value="" required>
            </div>
            <div class="mb-6 mt-4">
                <label for="password" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Password</label>
                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="password" value="" required>
            </div>
            <div class="mb-6 mt-4">
                <label for="password2" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Confirm Password</label>
                <input type="password" id="password2" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="password2" value="" required>
            </div>
            <button class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold" type="submit" name="action" value="register">Register</button>
        </form>
    </section>
</body>
</html>