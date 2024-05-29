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
            <h1 class="mb-10 overflow-hidden font-bold text-7xl">Contact</h1>
            <div>
                <a href="Home.php"><span class="mx-5 text-2xl hover:text-pink-700">Home</span></a>
                <span class="mx-5 text-2xl ">Contact</span>
            </div>
        </div>
     </main>

     <!-- content -->
     <section>
        <div class="container m-auto mt-20">
            <div class="grid grid-cols-1 gap-8 py-10 drop-shadow-lg px-14 md:grid-cols-1 lg:grid-cols-3 ">
                <div class="transition duration-300 ease-in-out delay-150 card hover:-translate-y-1 hover:scale-110">
                    <div class="bg-white border-2 rounded-lg py-14 border-pink-50 ">
                        <i class="flex justify-center m-auto mb-10 overflow-hidden text-9xl fa-solid fa-envelopes-bulk"></i>
                        <h1 class="mb-8 overflow-hidden text-5xl font-bold text-center text-black"><span class="px-2 text-pink-500">Email</span>Address</h1>
                        <span class="flex justify-center m-auto text-2xl">creative.floral.house@gmail.com</span>
                    </div>
                </div>
                <div class="transition duration-300 ease-in-out delay-150 card hover:-translate-y-1 hover:scale-110">
                    <div class="bg-white border-2 rounded-lg py-14 border-pink-50 ">
                        <i class="flex justify-center m-auto mb-10 overflow-hidden text-9xl fa-solid fa-phone"></i>
                        <h1 class="mb-8 overflow-hidden text-5xl font-bold text-center text-black"><span class="px-2 text-pink-500">Phone</span>no</h1>
                        <span class="flex justify-center m-auto text-2xl">07496413731</span>
                    </div>
                </div>
                <div class="transition duration-300 ease-in-out delay-150 card hover:-translate-y-1 hover:scale-110">
                    <div class="bg-white border-2 rounded-lg py-14 border-pink-50 ">
                        <i class="flex justify-center m-auto mb-10 overflow-hidden text-9xl fa-solid fa-location-dot"></i>
                        <h1 class="mb-8 overflow-hidden text-5xl font-bold text-center text-black"><span class="px-2 text-pink-500">Office</span>Address</h1>
                        <span class="flex justify-center m-auto text-2xl">Rochdale, Manchester, UK</span>
                    </div>
                </div>
            </div>
        </div>
     </section>
    <!-- form -->
    <section class="container py-10 mx-auto bg-slate-50 drop-shadow-lg">
        <h1 class="mt-10 mb-8 overflow-hidden text-4xl font-bold text-center text-black lg:mt-20 lg:text-5xl"><span class="px-3 text-pink-500">Contact</span>Information</h1>
        <form action="Contact.php" method = "POST">
            <div class="px-4 mt-8 mb-10 lg:px-60">
                <div class="flex flex-col">
                    <div class="flex flex-row gap-10 lg:flex-row">
                        <input type="text" name="firstname" placeholder="Enter first name" required class="w-full h-16 p-4 mb-8 transition ease-in-out delay-150 outline-pink-500 lg:w-1/2 drop-shadow-md">
                        <input type="text" name="lastname" placeholder="Enter last name" required class="w-full h-16 p-4 mb-8 transition ease-in-out delay-150 outline-pink-500 lg:w-1/2 drop-shadow-md">
                    </div>
                    <div class="flex flex-row gap-10 lg:flex-row">
                        <input type="email" name="email" placeholder="Enter Email Address" required class="w-full h-16 p-4 mb-8 transition ease-in-out delay-150 outline-pink-500 lg:w-1/2 drop-shadow-md">
                        <input type="number" name="phone" placeholder="Enter Phone No" required class="w-full h-16 p-4 mb-8 transition ease-in-out delay-150 outline-pink-500 lg:w-1/2 drop-shadow-md">
                    </div>
                    <textarea placeholder='Message' name="message" rows="6"
                class="w-full px-4 pt-3 mb-6 rounded-md outline-pink-500"></textarea>
                    <button type="submit" value="submit" class="w-full px-4 py-4 text-xl text-white transition ease-in-out delay-150 bg-pink-500 border-0 rounded-lg lg:text-3xl text-decoration-none drop-shadow-xl hover:bg-pink-700 hover:text-white">Submit</button>
                </div>
            </div>
        </form>
    </section>

     
<!-- footer -->
<?php

include("footer.php");

?>
  
</body>
</html>