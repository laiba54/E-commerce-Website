<header class="sticky-nav">
        <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
        <div class="container mx-auto">
            <div class="navbar">
                <div class="w-full p-4 px-10 text-black bg-pink-100 shadow-md">
                    <div x-data="{ open: false }" class="flex flex-col max-w-screen-xl px-4 mx-auto md:flex-row md:items-center md:justify-between md:px-6 lg:px-8">
                        <div class="flex items-center justify-between p-4 md:p-0">
                            <img src="images/logo.png" alt="image" width="100" height="90">
                            <button class="rounded-md md:hidden" @click="open = !open">
                                <svg fill="currentColor" viewBox="0 0 20 20" class="w-6 h-6">
                                    <path x-show="!open" fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM9 15a1 1 0 011-1h6a1 1 0 110 2h-6a1 1 0 01-1-1z" clip-rule="evenodd"></path>
                                    <path x-show="open" fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                </svg>
                            </button>
                        </div>
                        <nav :class="{ 'flex': open, 'hidden': !open }" class="flex-col flex-grow hidden py-4 md:flex md:flex-row md:items-center md:justify-center md:py-0">
                            <ul class="flex flex-col md:flex-row md:ml-auto">
                                <li><a class="px-4 py-2 leading-loose transition-all border-b-2 border-transparent lg:text-3xl md:text-xl md:mt-0 hover:text-pink-600 hover:border-pink-600" href="Home.php">Home</a></li>
                                <li class="relative" x-data="{ open: false }">
                                    <a @click="open = !open" href="#" class="px-4 py-2 leading-loose transition-all border-b-2 border-transparent lg:text-3xl md:text-xl md:mt-0 hover:text-pink-600 hover:border-pink-600">About</a>
                                    <ul x-show="open" @click.away="open = false" class="absolute left-0 z-10 flex flex-col gap-5 py-8 mt-2 text-center bg-pink-100 rounded-md shadow-md w-72">
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="About.php">About us</a></li>
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="faqs.php">FAQ's</a></li>
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="refundpolicy.php">Refund Policy</a></li>
                                    </ul>
                                </li>
                                <li class="relative" x-data="{ open: false }">
                                    <a @click="open = !open" href="#" class="px-4 py-2 leading-loose transition-all border-b-2 border-transparent lg:text-3xl md:text-xl md:mt-0 hover:text-pink-600 hover:border-pink-600">Shop</a>
                                    <ul x-show="open" @click.away="open = false" class="absolute left-0 z-10 flex flex-col gap-5 py-8 mt-2 text-center bg-pink-100 rounded-md shadow-md w-60">
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="Bouquet.php">Bouquets</a></li>
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="Hampers.php">Hampers</a></li>
                                    </ul>
                                </li>
                                <li class="relative" x-data="{ open: false }">
                                    <a @click="open = !open" href="#" class="px-4 py-2 pb-4 leading-loose transition-all border-b-2 border-transparent lg:text-3xl md:text-xl md:mt-0 hover:text-pink-600 hover:border-pink-600">Occasions</a>
                                    <ul x-show="open" @click.away="open = false" class="absolute left-0 z-10 flex flex-col gap-5 py-8 mt-2 text-center bg-pink-100 rounded-md shadow-md w-80">
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="Mother'sday.php">Mother's Day</a></li>
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="valentinesday.php">Valentine's Day</a></li>
                                        <li><a class="px-4 py-2 leading-loose text-black transition-all border-b-2 border-transparent lg:text-3xl md:text-xl hover:text-pink-600 hover:border-pink-600" href="happybirthday.php">Happy Birthday</a></li>
                                    </ul>
                                </li>
                                <!-- <li><a class="px-4 py-2 leading-loose transition-all border-b-2 border-transparent lg:text-3xl md:text-xl md:mt-0 hover:text-pink-600 hover:border-pink-600" href="order.php">Order</a></li> -->
                                <li><a class="px-4 py-2 leading-loose transition-all border-b-2 border-transparent lg:text-3xl md:text-xl md:mt-0 hover:text-pink-600 hover:border-pink-600" href="Contact.php">Contact</a></li>
                            </ul>
                            <ul class="flex flex-col gap-5 md:flex-row">
                                <li class="relative">
                                    <a class="relative flex-wrap items-center px-4 py-2 leading-loose transition-all border-b-2 border-transparent lg:text-3xl md:text-xl iconcart md:mt-0 hover:text-pink-600 hover:border-pink-600" href="order.php">
                                        <i class="fa-solid fa-cart-shopping"></i>
                                        <!-- <span class="absolute top-0 right-0 flex items-center justify-center w-4 h-4 text-xs text-white bg-pink-600 rounded-full totalquantity">0</span> -->
                                    </a>
                                </li>
                                <li><a class="px-6 py-3 text-xl leading-loose text-white transition-all bg-pink-600 rounded-full md:mt-0 hover:bg-pink-700" href="login.php">Login</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </header>