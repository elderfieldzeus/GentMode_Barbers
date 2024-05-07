<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image" href="../assets/images/logo.png">
    <title>Admin Page |GentMode Barbers</title>
  </head>
  <body>
        <div class="container my-5">
            <h2>List of Customers</h2>
            <a class="btn btn-primary" href="./create.php" role="button">New Customer</a>
            <br>
            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $servername = "localhost";
                        $username = "root";
                        $password = "";
                        $database = "getmode_db";

                        $conn = new mysqli($servername, $username, $password, $database);

                        //if ($conn->connect_error) {
                        //    die("Connection failed: " .$conn->connect_error);
                        //}
                        //echo "Connected successfully";

                        $sql = "SELECT * FROM signuo";
                        $result = $conn->query($sql);

                        if(!$result){
                            die("Invalid query: " .$conn->error);
                        }

                        while($row = $result->fetch_assoc()){
                            echo "
                            <tr>
                            <td>$row[id]</td>
                            <td>$row[username]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[password]</td>
                            <td>
                                <a class='btn btn-primary btn-sm' href='./edit.php?id=$row[id]'>Edit</a>
                                <a class='btn btn-danger btn-sm' href='./delete.php?id=$row[id]'>Delete</a>
                            </td>
                            </tr>";
                        }
                    ?>
                </tbody>
            </table>
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  </body>
</html>