<?php
// Add error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "getmode_db"; // Fixed variable name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Function to sanitize input data
function sanitize_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Check if form submitted for updating user data
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = sanitize_input($_POST["id"]);
    $username = sanitize_input($_POST["username"]);
    $email = sanitize_input($_POST["email"]);
    $phone = sanitize_input($_POST["phone"]);
    $password = sanitize_input($_POST["password"]);

    // Update user data in database
    $sql = "UPDATE users SET username='$username', email='$email', password='$password', phone='$phone' WHERE id='$id'";
    if ($conn->query($sql) === TRUE) {
        echo '<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">';
        echo '<strong class="font-bold">Success!</strong>';
        echo '<span class="block sm:inline"> User information updated successfully</span>';
        echo '</div>';
    } else {
        echo '<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">';
        echo '<strong class="font-bold">Error!</strong>';
        echo '<span class="block sm:inline"> Error updating user information: ' . $conn->error . '</span>';
        echo '</div>';
    }
}

// Retrieve user data from database
$sql = "SELECT * FROM users WHERE id = '1'"; // Change '1' to the logged-in user's ID
$result = $conn->query($sql);

if ($result) {
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $id = $row["id"];
        $username = $row["username"];
        $email = $row["email"];
        $phone = $row["phone"];
        $password = $row["password"];
    } else {
        echo "No user found";
    }
} else {
    echo "Error retrieving user data: " . $conn->error;
}

$conn->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit User Information</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link rel="icon" type="image" href="../assets/images/logo.png">
</head>
<body class="bg-gray-100">
    <div class="container mx-auto">
        <h2 class="text-2xl font-bold mb-4">Edit User Information</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
            <input type="hidden" name="id" value="<?php echo $id; ?>">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                    Name:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text" name="username" value="<?php echo $username; ?>">
            </div>
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                    Email:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="text" name="email" value="<?php echo $email; ?>">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="phone">
                    Phone:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="phone" type="text" name="phone" value="<?php echo $phone; ?>">
            </div>
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="password">
                    Password:
                </label>
                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" name="password" value="<?php echo $password; ?>">
            </div>
            <div class="flex items-center justify-between">
                <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="submit">
                    Update
                </button>
            </div>
        </form>
    </div>
</body>
</html>
