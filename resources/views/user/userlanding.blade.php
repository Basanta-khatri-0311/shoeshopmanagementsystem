@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Dashboard</title>
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f5f5f5;
            /* Change to your preferred background color */
            color: #333;
            /* Change text color for better contrast */
        }

        /* Define your custom styles */
        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* Slider Styles */
        .swiper-container {
            width: 100%;
            margin-bottom: 0;
            /* Adjust the margin-bottom property */
            padding-top: 20px;
        }

        .swiper-slide-image {
            width: 100%;
            height: 500px;
            /* Adjust the height as needed */
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        /* Product Card Styles */
        .product-card {
            background-color: #dfdada;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
            position: relative;
            z-index: 1;
        }

        .product-card:hover {
            transform: none;
            box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
        }

        .product-image {
            width: 100%;
            height: 200px;
            /* Adjust height as needed */
            object-fit: cover;
            border-radius: 6px;
            margin-bottom: 15px;
        }

        .product-title {
            font-size: 18px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product-description {
            font-size: 14px;
            color: #666;
            margin-bottom: 10px;
        }

        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #27ae60;
            /* Change to your preferred price color */
        }


        .popup-card {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 999;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .popup-content {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            max-width: 80%;
            /* Adjust maximum width as needed */
            max-height: 80%;
            /* Adjust maximum height as needed */
            overflow-y: auto;
            text-align: center;
            /* Center content */

        }
        .sort-font{
            color: black;
            font-size: 15px;
            margin: 0 10px;
        }
    </style>
</head>

<body>

    <div class="container mt-8">
        <div class="swiper-container" style="padding-top: 20px">
            <div class="swiper-wrapper">
                <!-- Swiper slides -->
                <div class="swiper-slide">
                    <img class="swiper-slide-image"
                        src="https://images.pexels.com/photos/2529157/pexels-photo-2529157.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="Slide 1" class="w-full h-96 object-cover rounded-md shadow-lg">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-slide-image"
                        src="https://images.unsplash.com/photo-1460353581641-37baddab0fa2?q=80&w=2942&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D"
                        alt="Slide 2" class="w-full h-96 object-cover rounded-md shadow-lg">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-slide-image"
                        src="https://images.pexels.com/photos/9252069/pexels-photo-9252069.png?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="Slide 3" class="w-full h-96 object-cover rounded-md shadow-lg">
                </div>
                <div class="swiper-slide">
                    <img class="swiper-slide-image"
                        src="https://images.pexels.com/photos/2385477/pexels-photo-2385477.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=2"
                        alt="Slide 4" class="w-full h-96 object-cover rounded-md shadow-lg">
                </div>

            </div>
            <!-- Add Pagination -->
            <div class="swiper-pagination"></div>
        </div>
        <div class="col-md-12 mb-3">
            <span class="font-weight-bold sort-font">Sort By: </span>
            <a href="{{ route('home', ['sort' => '']) }}" class="sort-font">All</a>
            <a href="{{ route('home', ['sort' => 'price_lo_hi']) }}" class="sort-font">Price - Low-High</a>
            <a href="{{ route('home', ['sort' => 'price_hi_lo']) }}" class="sort-font">Price - High-Low</a>
            <a href="{{ route('home', ['sort' => 'newest']) }}" class="sort-font">Newest</a>
        </div>
        
        <form action="" class="flex justify-end">
            <div class="flex items-center space-x-2">
                <input type="search" name="search" id="" class="form-control" placeholder="search product">
                <button
                    class="bg-blue-500 text-white py-2 px-4 rounded hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800">
                    Search
                </button>
                <a href="{{ 'home' }}" class="inline-block">
                    <button type="button"
                        class="bg-gray-300 text-gray-700 py-2 px-4 rounded hover:bg-gray-400 focus:outline-none focus:shadow-outline-gray active:bg-gray-500">
                        Reset
                    </button>
                </a>
            </div>
        </form>

        <!-- Display all products -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-6 mt-4">
            <!-- Sample product card -->
            @foreach ($allProducts as $product)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg product-card">
                    <div class="p-4">
                        <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-2">Quantity: {{ $product->qty }}</p>
                        <p class="text-gray-700 mb-2">Price: ${{ $product->price }}</p>
                        <p class="text-gray-700" id="description{{ $product->id }}"></p>
                        <button onclick="togglePopup('{{ $product->id }}')">Read more</button>
                        <div id="popup_{{ $product->id }}" class="popup-card">
                            <div class="popup-content">
                                {{ $product->description }}
                                <button onclick="togglePopup('{{ $product->id }}')">Close</button>
                            </div>
                        </div>
                    </div>
                    <div class="aspect-w-8 aspect-h-6">
                        <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }} Image"
                            class="object-cover">
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <footer class="bg-gray-900 text-white py-4 text-center mt-6">
        <div class="container">
            <p>&copy; 2022 FootFashion. All rights reserved.</p>
        </div>
    </footer>

    <!-- Swiper JS -->
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script>
        var swiper = new Swiper('.swiper-container', {
            slidesPerView: 1,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,

            },
            scrollbar: {
                el: '.swiper-scrollbar',
                hide: false,
            },
            loop: true,
            effect: 'fade',
            autoplay: {
                delay: 4000,
                disableOnInteraction: false,
            },
        });

        function togglePopup(productId) {
            const popup = document.getElementById('popup_' + productId);
            popup.style.display = (popup.style.display === 'none') ? 'flex' : 'none';
        }

        function showPopup(productId) {
            const popup = document.getElementById('popup_' + productId);
            popup.style.display = 'flex';
        }

        function hidePopup(productId) {
            const popup = document.getElementById('popup_' + productId);
            popup.style.display = 'none';
        }
        document.addEventListener('DOMContentLoaded', function() {
            const popups = document.querySelectorAll('.popup-card');
            popups.forEach(function(popup) {
                popup.style.display = 'none';
            });
        });
    </script>
</body>

</html>
