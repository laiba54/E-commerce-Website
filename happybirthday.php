<?php

require ("connection.php");

$q = "SELECT * from birthday";
$r = mysqli_query($con, $q); 


session_start();



if(isset($_POST['add_to_cart'])){
    if(isset($_SESSION['cart'])){

        $session_array_id=array_column($_SESSION['cart'],"id");

        if(!in_array($_GET['id'],$session_array_id)){
            $session_array=array(
                'id' => $_GET['id'],
                "images" =>$_POST['images'],
                "name" =>$_POST['name'],    
                "price" =>$_POST['price'],
                "quantity"=>$_POST['quantity']
            );
            $_SESSION['cart'][]=$session_array;

        }
        
    }else{
        $session_array=array(
            'id' => $_GET['id'],
            "images" =>$_POST['images'],
            "name" =>$_POST['name'],    
            "price" =>$_POST['price'],
            "quantity"=>$_POST['quantity']
        );
        $_SESSION['cart'][]=$session_array;
    }

}



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
    <link rel="stylesheet" href="assets/home.css">
    <link rel="stylesheet" href="assets/laiba.css">
    <script src="assets/script.js"></script>
    <script src="jquery-3.7.1.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
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
      <div class="container m-auto">
          <div class="flex flex-col items-center justify-center w-full bg-img">
              <h1 class="h-24 font-bold text-center text-white animate__animated animate__flip text-7xl">Happy Birthday</h1>
              <div class="flex items-center justify-center mt-10">
                  <a href="Home.php" class="mx-5 text-2xl text-white hover:text-pink-700">Home</a>
                  <span class="mx-5 text-2xl text-white">Happy Birthday</span>
              </div>
          </div>
      </div>
  </main>

<!-- products -->
<div class="container-fluid">
    <div class="mt-20 listproduct grid grid-cols-4 gap-8">
        <?php while($row = mysqli_fetch_array($r)) { ?>
            <div class="mt-5 item">
                <img src="images/<?php echo $row['birthday_image']; ?>" class="rounded-md drop-shadow-lg w-full h-64 object-cover" style ="height: 300px;" alt="<?php echo $row['birthday_name']; ?>">
                <h2 class="mt-2 text-center"><?php echo $row['birthday_name']; ?></h2>
                <div class="text-center price">$<?php echo $row['birthday_price']; ?></div>
                <form method="POST" action="happybirthday.php?id=<?php echo $row['birthday_id']; ?>">
                    <input type="hidden" name="images" value="images/<?php echo $row['birthday_image']; ?>">
                    <input type="hidden" name="name" value="<?php echo $row['birthday_name']; ?>">
                    <input type="hidden" name="price" value="<?php echo $row['birthday_price']; ?>">
                    <div class="mt-4 flex justify-center">
                        <input type="number" name="quantity" value="1" class="quantity-input text-center px-2 py-2 w-1/2 border border-gray-300 rounded-md outline-none" min="1" max="10">
                    </div>
                    <button type="submit" name="add_to_cart" value="Add To Cart" class="mt-4 w-full px-2 py-5 text-2xl text-white bg-pink-600 rounded-md hover:bg-pink-700 transition-colors duration-300">Add to Cart</button>
                </form>
            </div>
        <?php } ?>
    </div>
</div>

<!-- testimonials -->
<div class="p-6 mx-8 mt-20 bg-pink-100 sm:p-10">
    <div class="flex flex-row justify-center gap-10 py-10 text-5xl font-bold">
        <h1 class="text-black h-14">Testimonials</h1>
    </div>
    <div class="mx-auto">
        <div class="grid gap-4 md:grid-cols-3">
            <div class="col-span-2">
                <h2 class="text-2xl font-semibold">What our happy client say</h2>
            </div>
        </div>
        <div class="grid mt-12 md:grid-cols-4 md:gap-6 max-md:gap-10">
            <div class="h-auto p-4 bg-white rounded-md lg:p-8">
                <div class="flex items-center">
                    <img src="https://readymadeui.com/profile_2.webp" class="w-10 h-10 rounded-full" />
                    <div class="ml-4">
                        <h4 class="text-lg font-extrabold">John Doe</h4>
                        <p class="mt-1 text-gray-400 text-md">Founder of Rubik</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-lg leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Iste placeat incidunt nulla mollitia culpa exercitationem eum dolores impedit ratione nobis.</p>
                </div>
                <div class="flex mt-6 space-x-2">
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                </div>
            </div>
            <div class="h-auto p-4 bg-white rounded-md lg:p-8">
                <div class="flex items-center">
                    <img src="https://readymadeui.com/profile_3.webp" class="w-10 h-10 rounded-full" />
                    <div class="ml-4">
                        <h4 class="text-lg font-extrabold">Thomas</h4>
                        <p class="mt-1 text-gray-400 text-md">Founder of Alpha</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-lg leading-relaxed">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Tempora hic quo ducimus officia repellendus, doloremque nemo similique est neque commodi.</p>
                </div>
                <div class="flex mt-6 space-x-2">
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                </div>
            </div>
            
            <div class="h-auto p-4 bg-white rounded-md lg:p-8">
                <div class="flex items-center">
                    <img src="https://readymadeui.com/profile_3.webp" class="w-10 h-10 rounded-full" />
                    <div class="ml-4">
                        <h4 class="text-lg font-extrabold">Mark Adair</h4>
                        <p class="mt-1 text-gray-400 text-md">Founder of Alpha</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-lg leading-relaxed">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Magnam eius fuga est eos consequatur facere praesentium odit assumenda. Quis, voluptas.</p>
                </div>
                <div class="flex mt-6 space-x-2">
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                </div>
            </div>
            <div class="h-auto p-4 bg-white rounded-md lg:p-8">
                <div class="flex items-center">
                    <img src="https://readymadeui.com/profile_4.webp" class="w-10 h-10 rounded-full" />
                    <div class="ml-4">
                        <h4 class="text-lg font-extrabold">Simon Konecki</h4>
                        <p class="mt-1 text-gray-400 text-md">Founder of Labar</p>
                    </div>
                </div>
                <div class="mt-4">
                    <p class="text-lg leading-relaxed">Lorem ipsum dolor sit amet consectetur adipisicing elit. Ullam quaerat porro veniam animi error! Ullam optio beatae magni impedit velit.</p>
                </div>
                <div class="flex mt-6 space-x-2">
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#facc15]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                    <svg class="w-4 fill-[#CED5D8]" viewBox="0 0 14 13" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M7 0L9.4687 3.60213L13.6574 4.83688L10.9944 8.29787L11.1145 12.6631L7 11.2L2.8855 12.6631L3.00556 8.29787L0.342604 4.83688L4.5313 3.60213L7 0Z" />
                    </svg>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- footer -->
<?php

include("footer.php");

?>

</body>
</html>

