<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Product Display</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        .product-card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease-in-out;
        }

        .product-card:hover {
            transform: translateY(-5px);
        }

        /* Initially hide expanded description */
        .text-gray-700.hidden {
            display: none;
        }
    </style>
</head>
<x-app-layout>

    <body class="bg-#" style= "background-color: #fceadd  ; font-sans">
        <div class="container mx-auto p-8">
            <div class="flex justify-between items-center mb-8">
                <h1 class="text-3xl font-bold">Your Products</h1>
                <a href='{{ route('product.index') }}'
                    class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Your Products</a>
            </div>
            <div class="flex flex-wrap justify-between">
                @foreach ($products as $product)
                    <div class="w-1/4 bg-white rounded-lg overflow-hidden shadow-lg product-card mb-4 mx-2">
                        <div class="p-4">
                            <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
                            <p class="text-gray-700 mb-2">Quantity: {{ $product->qty }}</p>
                            <p class="text-gray-700 mb-2">Price: {{ $product->price }}</p>
                            <p class="text-gray-700" id="description{{ $product->id }}"></p>
                            <button onclick="toggleDescription({{ $product->id }})">Read More</button>
                            <p class="text-gray-700 hidden" id="full-description{{ $product->id }}">
                                {{ $product->description }}</p>
                        </div>
                        <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }} Image"
                            class="w-full h-auto object-cover">
                    </div>
                @endforeach
            </div>

        </div>
    </body>
</x-app-layout>


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
