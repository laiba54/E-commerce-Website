<?php
session_start(); // Start the session at the beginning

require("connection.php");

if (isset($_POST['login'])) {
    $adminName = $_POST['AdminName'];
    $adminPassword = $_POST['AdminPassword'];

    // Escaping the input data to prevent SQL injection
    $adminName = mysqli_real_escape_string($con, $adminName);
    $adminPassword = mysqli_real_escape_string($con, $adminPassword);

    $query = "SELECT * FROM admin WHERE admin_name='$adminName' AND admin_password='$adminPassword'";

    $result = mysqli_query($con, $query);

    if ($result && mysqli_num_rows($result) == 1) {
        // Set session variables
        $_SESSION['user_id'] = $adminName; // Assuming admin_name is unique and used as user_id
        $_SESSION['user_role'] = 'admin';

        // Redirect to admin.php
        header("Location: admin.php");
        exit();
    } else {
        echo "<div class='text-red-500 mt-4 text-center'>Incorrect Admin Name or Password</div>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel Login</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="flex items-center justify-center h-screen bg-gray-100">
    <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
        <h2 class="text-2xl font-bold text-center mb-6">Admin Login</h2>
        <form method="POST">
            <div class="mb-4">
                <input type="text" name="AdminName" placeholder="Admin Name" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            <div class="mb-6">
                <input type="password" name="AdminPassword" placeholder="Password" required class="w-full px-4 py-2 border rounded-lg focus:outline-none focus:ring-2 focus:ring-pink-500">
            </div>
            <button type="submit" name="login" class="w-full py-2 text-white bg-pink-600 rounded-lg hover:bg-pink-700">Login</button>
        </form>
    </div>
</body>
</html>