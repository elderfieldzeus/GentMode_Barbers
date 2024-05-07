<?php


    if(isset($_POST['submit'])){
        include "./connection.php";
        $username = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $sql = "SELECT * FROM signuo WHERE username ='$username'";
        $result = mysqli_query($conn, $sql);
        $count_user = mysqli_num_rows($result);

        $sql = "SELECT * FROM signuo WHERE email ='$email'";
        $result = mysqli_query($conn, $sql);
        $count_email = mysqli_num_rows($result);

        if($count_user == 0 && $count_email == 0){
            if($password == $cpassword){
                $hash = password_hash($password, PASSWORD_DEFAULT);
                $sql = "INSERT INTO signuo (username, email, password, phone) VALUES ('$username', '$email', '$hash', '$phone')";
                if(mysqli_query($conn, $sql)){
                    echo '<script>alert("Registration successful!"); window.location.href = "home.php";</script>';
                    exit();
                } else {
                    echo "Error: " . mysqli_error($conn);
                }
            }else{
                echo '<script>alert("Password do not match!"); window.location.href = "signup.php";</script>';
                exit();
            }
        }else{
            echo '<script>alert("User or email taken"); window.location.href = "../index.html";</script>';
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
    <link rel="icon" type="image" href="../assets/images/logo.png">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-gray-100 flex justify-center items-center h-screen">
    <div class="bg-white p-8 rounded-lg shadow-md w-96">
        <h2 class="text-2xl font-semibold mb-4">Sign up</h2>
        <form name="form" action="signup.php" method="POST">
            <div class="mb-4">
                <input type="text" id="name" name="name" placeholder="Username" class="mt-1 p-2 block w-full rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <input type="email" id="email" name="email" placeholder="Email" class="mt-1 p-2 block w-full rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <input type="text" id="phone" name="phone" placeholder="Phone Number" class="mt-1 p-2 block w-full rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <input type="password" id="password" name="password" placeholder="Password" class="mt-1 p-2 block w-full rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <input type="password" id="cpassword" name="cpassword" placeholder="Confirm Password" class="mt-1 p-2 block w-full rounded-md border border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500" required>
            </div>
            <div class="mb-4">
                <input type="submit" name="submit" value="Sign up" class="bg-indigo-500 text-white w-full py-2 rounded-md hover:bg-indigo-600 focus:outline-none focus:bg-indigo-600" required>
            </div>
        </form>
        <div class="text-center">
            <p class="text-sm text-gray-600 mb-2">Already have an account?</p>
            <a href="login.php" class="text-indigo-500 hover:text-indigo-700">Login</a>
        </div>
    </div>
</body>
</html>
