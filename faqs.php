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
    <link rel="stylesheet" href="assets/laiba.css">
    <script src="app.js"></script>
    <script src="checkout.js"></script>
    <script src="assets/script.js"></script>
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
            <h1 class="h-20 mb-10 overflow-hidden font-bold text-7xl">Faq's</h1>
            <div>
                <a href="Home.php"><span class="mx-5 text-2xl hover:text-pink-700">Home</span></a>
                <span class="mx-5 text-2xl ">Faq's</span>
            </div>
        </div>
     </main>

<!-- questions -->
<section>
        <div class="container px-4 m-auto">
               <div class="mt-20">
                           <div class="p-5 mt-4 bg-white border-2 rounded-2xl border-pink-50 drop-shadow-md" >
                            <h1 id="ques2" class="mt-5 text-3xl font-bold h-14">How can I make refund from your Website?</h1>
                            <p id="ans2" class="text-2xl leading-relaxed tracking-wider"> Please note that we currently do not offer refunds for purchases made through our website or Instagram account. You have the option to re arrange your order date up to once.We encourage you to carefully review the product details and reach out to us with any questions before making a purchase. Please don't hesitate to contact us directly.</p>
                           </div>
                           <div  class="p-5 mt-4 bg-white border-2 rounded-2xl border-pink-50 drop-shadow-md">
                            <h1 id="ques3" class="mt-5 text-3xl font-bold h-14">Are my details secured?</h1>
                            <p id="ans3" class="text-2xl leading-relaxed tracking-wider">We take the security and privacy of our customers' information very seriously. Rest assured that any personal details you provide during the purchasing process are securely stored and protected.</p>
                           </div>
                           <div  class="p-5 mt-4 bg-white border-2 rounded-2xl border-pink-50 drop-shadow-md">
                             <h1 id="ques4" class="mt-5 text-3xl font-bold h-14">What are the shipping charges?</h1>
                            <p id="ans4" class="text-2xl leading-relaxed tracking-wider">5£</p>
                           </div>
                           <div  class="p-5 mt-4 bg-white border-2 rounded-2xl border-pink-50 drop-shadow-md">
                            <h1 id="ques5" class="mt-5 text-3xl font-bold h-14">Can you make changes in the bouquet?</h1>
                            <p id="ans5" class="text-2xl leading-relaxed tracking-wider">Yes, you can change the color of flowers and the cards according to your occasion.</p>
                           </div>
                           <div  class="p-5 mt-4 mb-4 bg-white border-2 rounded-2xl border-pink-50 drop-shadow-md">
                            <h1 id="ques6" class="mt-5 text-3xl font-bold h-14">Do you accept credit and debit card?</h1>
                            <p id="ans6" class="text-2xl leading-relaxed tracking-wider">Yes, we do accept credit and debit cards.</p>
                           </div>
                    
               </div>
        </div>
     </section>
     
<!-- footer -->
<?php

include("footer.php");

?>
  
</body>
</html>