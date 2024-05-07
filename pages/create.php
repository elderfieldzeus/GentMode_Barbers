<?php

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "getmode_db";

    $conn = new mysqli($servername, $username, $password, $database, 3307);

    $username = "";
    $email = "";
    $phone = "";
    $password = "";

    $errorMessage = "";
    $successMessage = "";

    if ( $_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST["username"];
        $email = $_POST["email"]; 
        $phone = $_POST["phone"];
        $password = $_POST["password"];

        do{
            if(empty($username) || empty($email) || empty($phone) || empty($password)){
                $errorMessage = "All the fields are required";
                break;
            }

            $sql = "INSERT INTO signuo (username, email, phone, password)" .
                   "VALUES ('$username','$email','$phone','$password')";
            $result = $conn->query($sql);

            if(!$result){
                $errorMessage = "Invalid query: " . $conn->error;
                break;
            }

            $username = "";
            $email = "";
            $phone = "";
            $password = "";

            $successMessage = "Client Added Successfully!";

            header("location: ./admin.php");
            exit;

        } while (false);
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image" href="../assets/images/logo.png">
    <title>Create Account | GentMode Barber</title>
</head>
    <body>
        <div class="container my-5">
            <h2>New Client</h2>

                <?php
                    if(!empty($errorMessage)){
                        echo "
                        <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                            <strong>$errorMessage</strong>
                            <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                        </div>";
                    }
                ?>

                <form method="post">
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Username</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="username" value="<?php echo $username; ?>">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Email</label>
                            <div class="col-sm-6">
                                <input type="email" class="form-control" name="email" value="<?php echo $email; ?>">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Phone Number</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="phone" value="<?php echo $phone; ?>">
                            </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label">Password</label>
                            <div class="col-sm-6">
                                <input type="password" class="form-control" name="password" value="<?php echo $password; ?>">
                            </div>
                    </div>

                    <?php
                        if(!empty($successMessage)){
                            echo "
                            <div class='row mb-3'>
                                <div class='offset-sm-3 col-sm-6'>
                                    <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                        <strong>$successMessage</strong>
                                        <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                    </div>
                                </div>
                            </div>";
                        }
                    ?>

                    <div class="row mb-3">
                        <div class="offset-sm-3 col-sm-3 d-grid">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                        <div class="col-sm-3 d-grid">
                            <a class="btn btn-outline-primary" href="./admin.php" role="button">Cancel</a>
                        </div>
                    </div>
                </form>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    </body>
</html>