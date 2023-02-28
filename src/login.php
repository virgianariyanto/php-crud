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
    <section class="w-1/4 h-auto py-8 shadow-xl rounded-lg">
        <form action="" method="" class="w-5/6 mx-auto">
            <h1 class="text-xl text-slate-600 font-semibold text-center">Login</h1>
            <div class="mb-6 mt-4">
                <label for="first_name" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Username</label>
                <input type="text" id="first_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="nama" value="" required>
            </div>
            <div class="mb-6 mt-4">
                <label for="last_name" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Password</label>
                <input type="password" id="last_name" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="alamat" value="" required>
            </div>
            <button type="submit" class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold">Login</button>
            <button class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold" onclick="location.href='register.php'" type="button">Register</button>
        </form>
    </section>
</body>
</html>