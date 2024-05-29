<?php
require("connection.php");
session_start();

if (isset($_POST['submit-btn'])) {
    $name = $_POST['fullname'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $payment = $_POST['payment'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $country = $_POST['country'];

    $totalPrice = 0;

    if (!empty($_SESSION['cart'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            $price = isset($value['price']) ? floatval($value['price']) : 0;
            $quantity = isset($value['quantity']) ? floatval($value['quantity']) : 0;

            if ($quantity >= 1) {
                $totalPrice += $price * $quantity;
            }
        }
    }

    $totalPrice = number_format($totalPrice, 2);

    $q = "INSERT INTO `order` (fullname, email, phoneno, method, address, city, country, total) VALUES ('$name', '$email', '$phone', '$payment', '$address', '$city', '$country', '$totalPrice')";
    $r = mysqli_query($con, $q);

    if ($r) {
        echo "<div class='order-msg-container'>
                <div class='msg-container'>
                    <h3>Thank you For Shopping!</h3>
                    <div class='order-detail'>
                    <span class='total'>Total: \$" . number_format($totalPrice, 2) . "/-</span>
                    </div>
                    <div class='customer-details'>
                        <p>Name: <span>$name</span></p>
                        <p>Email: <span>$email</span></p>
                        <p>Phone no: <span>$phone</span></p>
                        <p>Payment method: <span>$payment</span></p>
                        <p>Address: <span>$address, $city, $country</span></p>
                        <p>(*Pay when products arrive*)</p>
                    </div>
                    <a href='Home.php' class='btn bg-pink-600 text-2xl rounded-md hover:bg-pink-700 py-4 px-5 text-white mb-4'>Continue Shopping</a>
                </div>
              </div>";
    } 
}
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
    <link rel="stylesheet" href="assets/laiba.css">
    <link rel="stylesheet" href="assets/style.css">
    <link rel="shortcut icon" href="images/main.jpg" type="image/x-icon">
    <title>E-commerce Website</title>

    <style>
        body {
            background-color: #f4f4f4;
        }

        .container-fluid {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .checkout-form {
            width: 100%;
        }

        .group {
            margin-bottom: 15px;
        }

        .group label {
            display: block;
            margin-bottom: 5px;
            color: #555;
        }

        .group input[type="text"],
        .group input[type="email"],
        .group input[type="tel"],
        .group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            font-size: 14px;
        }

        .group input[type="text"]:focus,
        .group input[type="email"]:focus,
        .group input[type="tel"]:focus,
        .group select:focus {
            border-color: #d53f8c;
            outline: none;
        }

        .group.flex-group {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
        }

        .group.flex-group .flex-item {
            flex: 1;
            min-width: 200px;
        }

        .radio-group {
            display: flex;
            align-items: center;
        }

        .radio-group input {
            margin-right: 10px;
        }

        .submit-btn {
            display: block;
            width: 100%;
            padding: 15px;
            color: #fff;
            border: none;
            border-radius: 5px;
            font-size: 18px;
            cursor: pointer;
        }

        @media (max-width: 600px) {
            .group.flex-group {
                flex-direction: column;
            }
            .container-fluid {
            max-width: 300px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        }
        @media (min-width: 768px) {
            .container-fluid {
            max-width: 600px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        }
        @media (min-width: 1024px) {
            .container-fluid {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        }

    </style>

</head>

<body>

<!-- navbar -->
<?php include("header.php"); ?>
  
<div class="flex flex-row justify-center gap-10 py-10 text-5xl font-bold mt-10">
    <h1 class="text-black h-14"><span class="text-pink-500">Complete Yo</span>ur Order</h1>
</div>

<section class="container-fluid">
    <div class="checkout-form">
        <form method="POST" action="">
            <div class="group flex-group">
                <div class="flex-item">
                    <label for="fullname" class="text-xl">Full Name</label>
                    <input type="text" name="fullname" id="fullname" placeholder="Enter your full name" required>
                </div>
                <div class="flex-item">
                    <label for="email" class="text-xl">Email</label>
                    <input type="email" name="email" id="email" placeholder="Enter your email" required>
                </div>
            </div>
            <div class="group flex-group">
                <div class="flex-item">
                    <label for="phone" class="text-xl">Phone Number</label>
                    <input type="tel" name="phone" id="phone" placeholder="Enter your phone number" required>
                </div>
                <div class="flex-item">
                    <label for="payment" class="text-xl">Payment Method</label>
                    <div class="radio-group">
                        <input type="radio" class="mt-4" name="payment" id="cash-on-delivery" value="cash-on-delivery" required>
                        <label for="cash-on-delivery" class="text-2xl mt-6">Cash on Delivery</label>
                    </div>
                </div>
            </div>
            <div class="group">
                <label for="address" class="text-xl">Address</label>
                <input type="text" name="address" id="address" placeholder="Enter your address" required>
            </div>
            <div class="group flex-group">
                <div class="flex-item">
                    <label for="city" class="text-xl">City</label>
                    <select name="city" id="city" required>
                        <option value="">Choose</option>
                        <option value="sahiwal">Sahiwal</option>
                        <option value="lahore">Lahore</option>
                        <option value="karachi">Karachi</option>
                    </select>
                </div>
                <div class="flex-item">
                    <label for="country" class="text-xl">Country</label>
                    <select name="country" id="country" required>
                        <option value="">Choose</option>
                        <option value="london">London</option>
                        <option value="pakistan">Pakistan</option>
                        <option value="uk">UK</option>
                    </select>
                </div>
            </div>
            <button type="submit" name="submit-btn" class="submit-btn bg-pink-600 hover:bg-pink-700">Place Order</button>
        </form>
    </div>
</section>

<!-- Order message container, initially hidden -->
<div class="order-msg-container" style="display: none;">
    <div class="msg-container">
        <h3>Thank you For Shopping!</h3>
        <div class="order-detail">
            <span class="total">Total: </span>
        </div>
        <div class="customer-details">
            <p>Name: <span class="name"></span></p>
            <p>Email: <span class="email"></span></p>
            <p>Phone no: <span class="phone"></span></p>
            <p>Payment method: <span class="payment"></span></p>
            <p>Address: <span class="address"></span></p>
            <p>(*Pay when products arrive*)</p>
        </div>
        <a href="Home.php" class="btn bg-pink-600 text-2xl rounded-md hover:bg-pink-700 py-4 px-5 text-white mb-4">Continue Shopping</a>
    </div>
</div>

<script>
    window.onscroll = () => {
        menu.classList.remove('fa-times');
        navbar.classList.remove('active');
    };
</script>

</body>
</html>
