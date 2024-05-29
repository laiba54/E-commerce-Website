<?php
session_start(); // Start the session

require("connection.php");

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id']) || $_SESSION['user_role'] !== 'admin') {
    header('Location: adminlogin.php'); // Redirect to login page if not logged in as admin
    exit();
}

// Fetch total orders from the database
$query = "SELECT COUNT(*) as total_orders FROM `order`";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$total_orders = mysqli_fetch_assoc($result)['total_orders'];

// Fetch total visitors from the database
$query = "SELECT COUNT(*) as total_visitors FROM `order`";
$result = mysqli_query($con, $query);
if (!$result) {
    die("Query failed: " . mysqli_error($con));
}
$total_visitors = mysqli_fetch_assoc($result)['total_visitors'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="images/main.jpg" type="image/x-icon">
    <title>Admin Panel</title>
    <style>
       body {
            margin: 0;
            font-family: 'Poppins', sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
        }
        .sidebar {
            width: 250px;
            background-color: #2d3748;
            height: 100vh;
            padding: 20px;
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            overflow-y: auto;
            z-index: 1000;
            transition: transform 0.3s ease;
        }
        .sidebar h2 {
            font-size: 1.5rem;
            margin-bottom: 20px;
        }
        .sidebar .side-menu {
            width: 100%;
            margin-top: 48px;
        }
        .sidebar .side-menu li {
            height: 48px;
            background: transparent;
            margin-left: 6px;
            border-radius: 48px 0 0 48px;
            padding: 4px;
        }
        .sidebar a {
            display: block;
            color: white;
            padding: 10px;
            margin-bottom: 10px;
            text-decoration: none;
            border-radius: 4px;
            transition: background 0.3s;
        }
        .sidebar .side-menu li a {
            width: 100%;
            height: 100%;
            display: flex;
            align-items: center;
            border-radius: 48px;
            font-size: 16px;
            white-space: nowrap;
        }
        .sidebar a:hover {
            background-color: #4a5568;
        }
        .container-fluid {
            margin-left: 250px;
            padding: 20px;
            width: calc(100% - 250px);
            transition: margin-left 0.3s ease;
        }
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                position: relative;
                transform: translateX(-100%);
            }
            .sidebar.open {
                transform: translateX(0);
            }
            .container-fluid {
                margin-left: 0;
                width: 100%;
            }
        }
        .stats {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
        }
        .stat {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            flex: 1;
            min-width: 250px;
        }
        .table-auto {
            width: 100%;
            border-collapse: collapse;
            overflow-x: auto;
        }
        .table-auto th,
        .table-auto td {
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        .table-auto th {
            background-color: #f4f4f4;
        }
        .menu-toggle {
            display: none;
        }
        @media (max-width: 768px) {
            .menu-toggle {
                display: block;
                background: #2d3748;
                color: white;
                padding: 10px;
                position: fixed;
                top: 0;
                left: 0;
                z-index: 1001;
                cursor: pointer;
            }
        }
    </style>
</head>
<body>
<div class="menu-toggle" id="menu-toggle">
    <i class="fas fa-bars"></i>
</div>
<div class="sidebar" id="sidebar">
    <a class="brand">
        <span class="text-4xl font-bold text-center">Admin Panel</span>
    </a>
    <ul class="side-menu">
        <li>
            <a href="admin.php">
                <span class="text">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="analytics.php">
                <span class="text">Analytics</span>
            </a>
        </li>
        <li>
            <a href="createorder.php">
                <span class="text">Orders</span>
            </a>
        </li>
        <li>
            <a href="logout.php">
                <span class="text-pink-600">Logout</span>
            </a>
        </li>
    </ul>
</div>

<div class="container-fluid">
    <h1 class="text-2xl font-bold mb-5">Dashboard</h1>
    <div class="stats">
        <div class="stat">
            <h3 class="text-xl">Total Visitors</h3>
            <p class="text-2xl"><?php echo $total_visitors; ?></p>
        </div>
        <div class="stat">
            <h3 class="text-xl">Total Orders</h3>
            <p class="text-2xl"><?php echo $total_orders; ?></p>
        </div>
    </div>

    <h2 class="text-2xl font-bold mt-10 mb-5">Orders</h2>
    <div class="overflow-x-auto">
        <table class="table-auto w-full">
            <thead>
                <tr class="bg-gray-700 text-black">
                    <th class="py-2 px-4">Order ID</th>
                    <th class="py-2 px-4">Full Name</th>
                    <th class="py-2 px-4">Email</th>
                    <th class="py-2 px-4">Phone Number</th>
                    <th class="py-2 px-4">Payment Method</th>
                    <th class="py-2 px-4">Address</th>
                    <th class="py-2 px-4">City</th>
                    <th class="py-2 px-4">Country</th>
                    <th class="py-2 px-4">Total Price</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $order_query = "SELECT * FROM `order`";
                $order_result = mysqli_query($con, $order_query);
                if (!$order_result) {
                    die("Query failed: " . mysqli_error($con));
                }
                $orders = mysqli_fetch_all($order_result, MYSQLI_ASSOC);

                foreach ($orders as $order): ?>
                    <tr class="text-center">
                        <td class="py-2 px-4"><?php echo $order['id']; ?></td>
                        <td class="py-2 px-4"><?php echo $order['fullname']; ?></td>
                        <td class="py-2 px-4"><?php echo $order['email']; ?></td>
                        <td class="py-2 px-4"><?php echo $order['phoneno']; ?></td>
                        <td class="py-2 px-4"><?php echo $order['method']; ?></td>
                        <td class="py-2 px-4"><?php echo $order['address']; ?></td>
                        <td class="py-2 px-4"><?php echo $order['city']; ?></td>
                        <td class="py-2 px-4"><?php echo $order['country']; ?></td>
                        <td class="py-2 px-4">$<?php echo number_format($order['total'], 2); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>

<script>
    window.onscroll = () => {
        menu.classList.remove('fa-times');
        navbar.classList.remove('active');
    };
    document.getElementById('menu-toggle').addEventListener('click', function() {
        document.getElementById('sidebar').classList.toggle('open');
    });
</script>
</body>
</html>
