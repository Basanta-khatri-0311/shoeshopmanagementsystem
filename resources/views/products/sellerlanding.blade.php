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

        /* Initially hide expanded description */
        .text-gray-700.hidden {
            display: none;
        }
    </style>
</head>

@livewire('navigation-menu')
<body class="bg-#" style="background-color: #fceadd; margin: 0;">
    <div class="container mx-auto">
        <h1 class="text-3xl font-bold mb-8">Your Products</h1>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            @foreach ($products as $product)
            <div class="bg-white rounded-lg overflow-hidden shadow-lg product-card">
                <div class="p-4">
                    <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
                    <p class="text-gray-700 mb-2">Quantity: {{ $product->qty }}</p>
                    <p class="text-gray-700 mb-2">Price: {{ $product->price }}</p>
                    <p class="text-gray-700" id="description{{ $product->id }}"></p>
                    <button onclick="toggleDescription({{ $product->id }})">Read More</button>
                    <p class="text-gray-700 hidden" id="full-description{{ $product->id }}">
                        {{ $product->description }}</p>
                </div>
                <div class="aspect-w-8 aspect-h-6">
                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }} Image" class="object-cover">
                </div>
            </div>
            @endforeach
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
