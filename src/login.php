<?php
session_start();
include 'connection.php';

// if(isset($_COOKIE['remember'])) {
//     if($_COOKIE['remember'] == 'true') {
//         $_SESSION['login'] = true;
//     } 
// }

if(isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT * FROM email FROM users WHERE id = '$id'");
    $row = mysqli_fetch_assoc($result);

    if($key === hash('sha256', $row['email'])) {
        $_SESSION['login'] = true;
    }
}

if(isset($_SESSION['login'])) {
    header('location: index.php');
    exit;
}



if(isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    //cek username
    if(mysqli_num_rows($result) === 1 ) {

        $row = mysqli_fetch_assoc($result);
        if( password_verify($password, $row['password']) ) {

            $_SESSION['login'] = true;

            //cek remember me
            if (isset($_POST['remember'])) {
                //buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['email']), time() + 60);
            }

            header('location: index.php');
            exit;
        }
    }

    $error = true;
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
    <style>
        .background{
            background-color: rgba(255, 119, 119, 0.1);
        }
    </style>
</head>
<body class="flex justify-center items-center h-screen">
    <section class="w-1/4 h-auto py-8 shadow-xl rounded-lg">
        <form action="" method="POST" class="w-5/6 mx-auto">
            <h1 class="text-xl text-slate-600 font-semibold text-center">Login</h1>
            <?php if(isset($error)) { ?>
                <div class="w-full h-10 mt-4 background flex items-center justify-center relative border-2 border-red-200 rounded-lg">
                    <p class="text-red-600">Username / Password salah</p>
                </div>
            <?php  }; ?>
            <div class="mb-6 mt-4">
                <label for="email" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Email</label>
                <input type="text" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="email" value="" required>
            </div>
            <div class="mb-6 mt-4">
                <label for="password" class="block mb-2 text-sm font-medium text-slate-500 dark:text-white">Password</label>
                <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="password" value="" required>
            </div>
            <div class="flex gap-x-2 mb-6 mb-4">
                <input type="checkbox" id="remember" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="..." name="remember" value="">
                <label for="remember" class="text-sm font-medium text-slate-500 dark:text-white">Remember me</label>
            </div>
            <button type="submit" name="login" class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold">Login</button>
            <button class="bg-blue-600 hover:bg-blue-700 hover:transition-all py-2 px-5 text-white rounded-md font-semibold" onclick="location.href='register.php'" type="button">Register</button>
        </form>
    </section>
</body>
</html>