<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="assets/laiba.css">
    <script src="app.js"></script>
    <script src="checkout.js"></script>
    <title>About Us</title>
    
</head>

<body class="bg-gray-100">

<!-- nav bar -->
<?php

include("header.php");

?>
    
    <!--main content  -->
    <main>
       <div class="container m-auto mt-32 ml-14">
        <h1 class="mb-10 overflow-hidden text-4xl font-bold text-left">Delivery Information</h1>
        <span class="px-2 text-2xl font-semibold tracking-widest text-justify bg-slate-300">Which days do you deliver?</span>
        <p class="mt-2 mb-8 text-xl tracking-widest text-justify ">
            We offer deliveries Monday to Sunday.
        </p>
        <span class="px-2 text-2xl font-semibold tracking-widest text-justify bg-slate-300">Where do you ship?</span>
        <p class="mt-2 mb-5 text-xl tracking-widest text-justify ">
            Currently, We only deliver in Rochdale, Manchester.
        </p>
       </div>
    </main>


<!-- footer -->
<?php

include("footer.php");

?>
</body>

</html>