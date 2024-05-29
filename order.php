<?php

require ("connection.php");
session_start();


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
</head>
<body>

<!-- header -->
<?php

include("header.php");

?>
   
<section>
    <div class="flex flex-row justify-center gap-10 py-10 text-5xl font-bold mt-10">
        <h1 class="text-black h-14"><span class="text-pink-500">Shopping</span> Cart</h1>
    </div>

   <div class="w-full overflow-auto px-6">
    <?php
        $total = 0;
        $output = "";

        $output .= "
            <table class='w-full table-auto border-collapse border border-gray-300'>
                <thead>
                    <tr class='bg-pink-600 text-white'>
                        <th class='py-4 px-6 border border-gray-300 text-3xl'>Id</th>
                        <th class='py-4 px-6 border border-gray-300 text-3xl'>Image</th>
                        <th class='py-4 px-6 border border-gray-300 text-3xl'>Name</th>
                        <th class='py-4 px-6 border border-gray-300 text-3xl'>Quantity</th>
                        <th class='py-4 px-6 border border-gray-300 text-3xl'>Price</th>
                        <th class='py-4 px-6 border border-gray-300 text-3xl'>Total price</th>
                        <th class='py-4 px-6 border border-gray-300 text-3xl'>Action</th>
                    </tr>
                </thead>
                <tbody>
        ";

        if (!empty($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $key => $value) {
                $price = isset($value['price']) ? floatval($value['price']) : 0;
                $quantity = isset($value['quantity']) ? floatval($value['quantity']) : 0;

                if ($quantity >= 1) {
                    $totalPrice = number_format($price * $quantity, 2);
                } else {
                    $totalPrice = "Invalid data";
                }

                $output .= "
                    <tr class='text-center text-xl py-4 px-6 border-b border-gray-300'>
                        <td class='py-4 px-6 border border-gray-300'>{$value['id']}</td>
                        <td class='py-4 px-6 border border-gray-300'>
                            <img src='{$value['images']}' alt='{$value['name']}' class='h-16 w-16 object-cover mx-auto'>
                        </td>
                        <td class='py-4 px-6 border border-gray-300'>{$value['name']}</td>
                        <td class='py-4 px-6 border border-gray-300'>{$quantity}</td>
                        <td class='py-4 px-6 border border-gray-300'>\${$price}</td>
                        <td class='py-4 px-6 border border-gray-300'>\${$totalPrice}</td>
                        <td class='py-4 px-6 border border-gray-300'>
                            <a href='order.php?action=remove&id={$value['id']}'>
                                <button class='btn-block bg-pink-600 hover:bg-pink-700 text-white py-2 px-4 rounded'>Remove</button>
                            </a>
                        </td>
                    </tr>
                ";

                // Update the total correctly
                $total += $price * $quantity;
            }

            $output .= "
    <tr class='text-center'>
        <td colspan='1'>
            <a href='Home.php'>
                <button class='btn-block bg-pink-600 hover:bg-pink-700 text-white py-3 px-4 rounded'>Continue Shopping</button>
            </a>
        </td>
        <td colspan='3'></td>
        <td class='py-4 px-6 text-3xl'><b>Total Price</b></td>
        <td class='py-4 px-6 text-3xl'>\$" . number_format($total, 2) . "</td>
        <td>
            <a href='order.php?action=clearall'>
                <button class='btn-block bg-pink-600 hover:bg-pink-700 text-white py-2 px-4 rounded'>Clear All</button>
            </a>
        </td>
    </tr>
    <tr class='text-center border-t border-gray-300'>
        <td colspan='7' class='border-t border-gray-300' style='padding-bottom: 20px;'>
            <a href='checkout.php'>
                <button class='btn-block text-2xl bg-pink-600 hover:bg-pink-700 text-white py-4 px-4 rounded' style='margin-top: 20px;'>PROCEED TO CHECKOUT</button>
            </a>
        </td>
    </tr>
";
        } else {
            $output .= "
                <tr>
                    <td colspan='7' class='text-center text-3xl py-8 px-6'>Your cart is empty</td>
                </tr>
            ";
        }

        $output .= "
                </tbody>
            </table>
        ";

        echo $output;
    ?>
</div>

<?php
   

    if (!isset($_SESSION['cart'])) {
        $_SESSION['cart'] = array(); 
    }

    if (isset($_GET['action'])) {
        if ($_GET['action'] == "clearall") {
            unset($_SESSION['cart']);
        }

        if ($_GET['action'] == "remove") {
            foreach ($_SESSION['cart'] as $key => $value) {
                if ($value['id'] == $_GET['id']) {
                    unset($_SESSION['cart'][$key]);
                }
            }
        }
    }
?>




   </section>
</html>
