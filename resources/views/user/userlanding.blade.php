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

        .sort-link {
            text-decoration: none;
            color: #333;
            padding: 5px 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 0 5px;
            transition: background-color 0.3s ease, color 0.3s ease;
        }

        .sort-link:hover {
            background-color: #0066cc;
            color: #fff;
        }

        .sort-link.active {
            color: #0066cc;
            font-weight: bold;
        }

        .sort-font {
            font-weight: bold;
            color: black;
            font-size: 15px;
            margin: 0 10px;
        }

        .sort-link.active {
            background-color: #0066cc;
            color: #fff;
            font-weight: bold;
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


        <div class="col-md-12 mb-3 flex items-center">
            <div class="flex items-center space-x-4">
                <span class="font-weight-bold sort-font">Sort By: </span>
                <a class="sort-link" href="{{ route('home', ['sort' => '']) }}" class="sort-link">All</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'price_lo_hi']) }}" class="sort-link">Price -
                    Low-High</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'price_hi_lo']) }}" class="sort-link">Price -
                    High-Low</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'newest']) }}" class="sort-link">Newest</a>
            </div>

            <form action="{{ route('home') }}" method="get" class="ml-auto">
                <div class="flex items-center space-x-2">
                    <input type="search" name="search" class="form-control px-4 py-2 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition-all duration-300 ease-in-out w-96"
                        placeholder="Search product">
                    <button type="submit"
                        class="bg-blue-500 text-white py-2 px-4 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition-all duration-300 ease-in-out">
                        Search
                    </button>
                </div>
            </form>
            
            
        </div>

        <!-- Display all products -->

        <body class="bg-#" style="background-color: #fceadd; margin: 0;">
            <div class="container mx-auto">
                <h1 class="text-3xl font-bold mb-8">Your Products</h1>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    @foreach ($allProducts as $product)
                        <div class="bg-white rounded-lg overflow-hidden shadow-lg product-card">
                            <div class="p-4">
                                <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
                                <p class="text-gray-700 mb-2">Quantity: {{ $product->qty }}</p>
                                <p class="text-gray-700 mb-2 product-price">Price: ${{ $product->price }}</p>
                                <p class="text-gray-700" id="description{{ $product->id }}"></p>
                                <button onclick="toggleDescription({{ $product->id }})">Read More</button>
                                <p class="text-gray-700 hidden" id="full-description{{ $product->id }}">
                                    {{ $product->description }}</p>
                            </div>
                            <div class="aspect-w-8 aspect-h-6">
                                <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }} Image"
                                    class="object-cover">
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="mt-8">
                    {{ $allProducts->links() }}
                </div>
            </div>
            
        </body>
       
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

        function toggleDescription(productId) {
            var description = document.getElementById('description' + productId);
            var fullDescription = document.getElementById('full-description' + productId);
            var buttonText = description.classList.toggle('expanded') ? 'Read Less' : 'Read More';
            description.textContent = description.classList.contains('expanded') ? fullDescription.textContent : str_limit(
                fullDescription.textContent, 20);
            description.nextElementSibling.textContent = buttonText;
        }
    </script>
</body>

</html>
