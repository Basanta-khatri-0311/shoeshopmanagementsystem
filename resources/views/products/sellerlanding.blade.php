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
    </style>
</head>

<body class="bg-#" style= "background-color: #fceadd  ; font-sans">
    <div class="container mx-auto p-8">
        <div class="flex justify-between items-center mb-8">
            <h1 class="text-3xl font-bold">Your Products</h1>
            <a href='{{ route('product.index') }}' class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit Your Products</a>
        </div>
        <div class="grid grid-cols-1 gap-8">
            @foreach ($products as $product)
                <div class="bg-white rounded-lg overflow-hidden shadow-lg product-card flex">
                    <div class="p-4 w-2/3">
                        <h2 class="text-xl font-bold mb-2">{{ $product->name }}</h2>
                        <p class="text-gray-700 mb-2">Quantity: {{ $product->qty }}</p>
                        <p class="text-gray-700 mb-2">Price: {{ $product->price }}</p>
                        <p class="text-gray-700">{{ $product->description }}</p>
                    </div>
                    <img src="{{ asset($product->product_image) }}" alt="{{ $product->name }} Image" class="w-1/3 h-auto object-cover">
                </div>
            @endforeach
        </div>
    </div>
</body>

</html>
