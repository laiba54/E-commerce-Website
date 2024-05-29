<?php

require('connection.php');

?>


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
    <script src="jquery-3.7.1.min.js"></script>
    <script src="assets/script.js"></script>
    <link rel="stylesheet" href="assets/laiba.css">
    <script src="app.js"></script>
    <script src="checkout.js"></script>
    <link rel="shortcut icon" href="images/main.jpg" type="image/x-icon">
    <title>E-commerce Website</title>
</head>
<body>

<!-- nav bar -->
<?php

include("header.php");

?>
<!-- main section -->
     <main>
        <div class="container m-auto text-center text-white bg-pink-500 border-2 border-pink-50 py-28 mt-28 drop-shadow-lg">
            <h1 class="mb-10 overflow-hidden font-bold text-7xl">My Account</h1>
            <div>
                <a href="Home.php"><span class="mx-5 text-2xl hover:text-pink-700">Home</span></a>
                <span class="mx-5 text-2xl ">My Account</span>
            </div>
        </div>
     </main>
     <section class="container mx-auto mt-10 lg:mt-20 bg-slate-50 drop-shadow-lg">
    <div class="w-full mx-auto lg:w-3/4">
        <h1 class="py-5 mt-8 mb-8 overflow-hidden text-4xl font-bold text-center text-black md:text-5xl lg:text-6xl"><span class="px-3 text-pink-500">Log</span>In</h1>
        <form action="signup.php" method="POST">
            <div class="flex flex-col px-6 mt-8 mb-10 lg:px-60">
                <input type="text" name="username" placeholder="Username" required class="w-full p-4 mb-8 outline-none hover:border-2 hover:border-pink-500 h-14 drop-shadow-md">
                <input type="password" name="password" placeholder="Password" required class="w-full p-4 outline-none hover:border-2 hover:border-pink-500 h-14 drop-shadow-md">
                <div class="my-5 text-lg font-semibold text-right lg:text-xl pe-2">
                    <a href="forget.php">Forget password?</a>
                </div>
                <div class="flex justify-center gap-4">
                    <button type="submit" value="send" class="w-full lg:w-1/2 px-4 py-4 text-xl text-white transition ease-in-out delay-150 bg-pink-600 border-0 rounded-lg lg:text-3xl text-decoration-none drop-shadow-xl hover:bg-pink-700">Login</button>
                    <a href="adminlogin.php" class="w-full lg:w-1/2 px-4 py-4 text-xl text-center text-white transition ease-in-out delay-150 bg-pink-600 border-0 rounded-lg lg:text-3xl text-decoration-none drop-shadow-xl hover:bg-pink-700">Admin panel</a>
                </div>
                <div class="flex flex-col gap-3 mx-auto my-5 text-lg lg:flex-row">
                    <div class="text-center lg:text-left">Do not have an Account?</div>
                    <div class="font-semibold text-center lg:text-left"><a href="signup.php">Sign up</a></div>
                </div>
            </div>
        </form>
    </div>
</section>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
  $(document).ready(function () {
    $('#loginForm').on('submit', function (event) {
      var username = $('#username').val();
      var password = $('#password').val();

      if (username === '' || password === '') {
        alert('Please fill in all fields.');
        event.preventDefault(); // Prevent form submission
        
 // Prevent form submission
                return false;
            }
        });
    });
</script>
     

<!-- footer -->
<?php

include("footer.php");

?>
    </body>
</html>