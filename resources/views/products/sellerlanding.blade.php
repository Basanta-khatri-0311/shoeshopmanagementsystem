<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <style>
        .product-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

      
        .text-gray-700.hidden {
            display: none;
        }

        .product-price {
            font-size: 16px;
            font-weight: bold;
            color: #27ae60;
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

@livewire('navigation-menu')

<body class="bg-#" style="background-color: #fceadd; margin: 0;">

    <div class="col-md-12 mb-3 m-6">
        <div class="mb-4 flex items-center">
            <div class="flex items-center space-x-4">
                <span class="font-weight-bold sort-font">Sort By: </span>
                <a class="sort-link" href="{{ route('home', ['sort' => '']) }}" class="sort-link">All</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'price_lo_hi']) }}" class="sort-link">Price -
                    Low-High</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'price_hi_lo']) }}" class="sort-link">Price -
                    High-Low</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'quantity_lo_hi']) }}" class="sort-link">Quantity
                    - Low-High</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'quantity_hi_lo']) }}" class="sort-link">Quantity
                    - High-Low</a>
                <a class="sort-link" href="{{ route('home', ['sort' => 'newest']) }}" class="sort-link">Newest</a>

            </div>

            <form action="{{ route('home') }}" method="get" class="ml-auto">
                <div class="flex items-center space-x-2">
                    <input type="search" name="search"
                        class="form-control px-2 py-1 border border-gray-300 rounded-md focus:outline-none focus:border-blue-500 transition-all duration-300 ease-in-out w-60"
                        placeholder="Search product" aria-label="Search products">

                    <button type="submit"
                        class="bg-blue-500 text-white py-1 px-2 rounded-md hover:bg-blue-700 focus:outline-none focus:shadow-outline-blue active:bg-blue-800 transition-all duration-300 ease-in-out">
                        Search
                    </button>
                </div>
            </form>
        </div>
    </div>


    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-8">Your Products</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            
                @if ($products->isEmpty())
                    <h1>You have not added any products yet.</h1>
                @else
                   
                    @foreach ($products as $product)
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
                    <div class="mt-4">
                        {{ $products->links() }}
                    </div>
                @endif
           
        </div>
    </div>
</body>

<footer class="bg-gray-900 text-white py-4 text-center custom-bg mt-20">
    <p>&copy; 2022 FootFashion. All rights reserved.</p>
</footer>

</html>
<script>
    function toggleDescription(productId) {
        var description = document.getElementById('description' + productId);
        var fullDescription = document.getElementById('full-description' + productId);
        var buttonText = description.classList.toggle('expanded') ? 'Read Less' : 'Read More';
        description.textContent = description.classList.contains('expanded') ? fullDescription.textContent : str_limit(
            fullDescription.textContent, 20);
        description.nextElementSibling.textContent = buttonText;
    }

    function str_limit(string, limit) {
        return string.trim().split(/\s+/).slice(0, limit).join(' ') + '...';
    }
</script>
