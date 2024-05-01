<?php

    if(isset($_POST['submit'])){
        include "connection.php";
        $email = $_POST['email'];
        $password = $_POST['password'];
    
        $sql = "SELECT * FROM signuo WHERE email ='$email'";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);

        if($count == 1){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                header("Location: home.php");
                exit();
            }else{
                echo '<script>alert("Incorrect password!"); window.location.href = "login.php";</script>';
                exit();
            }
        }else{
            echo '<script>alert("User not found!"); window.location.href = "login.php";</script>';
            exit();
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Form</title>
    <link rel="stylesheet" href="../style/login.css">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96" id="form">
        <h2 class="text-2xl font-semibold mb-6">Let's Begin</h2>
        <form action="login.php" method="POST">
            <div class="mb-6">
                <input type="email" id="email" name="email" placeholder="Email" class="mt-1 p-2 block w-full rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-6">
                <input type="password" id="password" name="password" placeholder="Password" class="mt-1 p-2 block w-full rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500">
            </div>
            <div class="mb-6">
                <button type="submit" name="submit" class="bg-indigo-500 text-white w-full py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600">Login</button>
            </div>
        </form>
        <div class="text-center">
            <p class="text-sm text-gray-600 mb-2">Don't have an account?</p>
            <a href="signup.php" class="text-indigo-500 hover:text-indigo-700">Sign up</a>
        </div>
    </div>
</body>
</html>
