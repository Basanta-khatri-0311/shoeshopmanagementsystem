<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class="bg-#" style= "background-color:#fceadd  ;" font-sans">
    {{-- <nav class="bg-dark text-white p-4">
        <div class="flex justify-between items-center">
            <a href="#" class="text-white font-bold text-lg">Shoes Mgmt</a>
            <button type="button" class="text-white lg:hidden">
                <svg class="h-6 w-6 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path fill-rule="evenodd" d="M3 18h18v-2H3v2zM3 13h18v-2H3v2zM3 6v2h18V6H3z" clip-rule="evenodd" />
                </svg>
            </button>
            <div class="hidden lg:flex lg:items-center">
                <ul class="flex ml-4 space-x-4">
                    <li>
                        <a href="#" class="text-white hover:text-gray-200">Home</a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-gray-200">Shoes</a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-gray-200">Brands</a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-gray-200">Stores</a>
                    </li>
                    <li>
                        <a href="#" class="text-white hover:text-gray-200">Sales</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav> --}}
    

    <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold mb-4 text-center">Your products</h1>
    <div class="overflow-x-auto">
        <table class="w-full table-auto border-collapse border border-gray-500">
            <tr>
                <th class="border border-gray-500 px-4 py-2">Id</th>
                <th class="border border-gray-500 px-4 py-2">Product Name</th>
                <th class="border border-gray-500 px-4 py-2">Quantity</th>
                <th class="border border-gray-500 px-4 py-2">Price</th>
                <th class="border border-gray-500 px-4 py-2">Description</th>
                <th class="border border-gray-500 px-4 py-2">Product Image</th>
                <th class="border border-gray-500 px-4 py-2">Edit</th>
                <th class="border border-gray-500 px-4 py-2">Delete</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td class="border border-gray-500 px-4 py-2">{{ $product->id }}</td>
                    <td class="border border-gray-500 px-4 py-2">{{ $product->name }}</td>
                    <td class="border border-gray-500 px-4 py-2">{{ $product->qty }}</td>
                    <td class="border border-gray-500 px-4 py-2">{{ $product->price }}</td>
                    <td class="border border-gray-500 px-4 py-2">{{ $product->description }}</td>
                    <td class="border border-gray-500 px-4 py-2"><img src="{{ asset($product->product_image) }}" alt="{{ $product->name }} Image" class="w-20 h-20 object-cover"></td>
                    <td class="border border-gray-500 px-4 py-2">
                        <a href="{{ route('product.edit', ['product' => $product]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Edit </a>
                    </td>
                    <td class="border border-gray-500 px-4 py-2">
                        <form action="{{ route('product.delete', ['product' => $product]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    </div>
    <div class="mt-4 flex justify-center">
        <a href="{{ route('product.add') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded"
        >Add product</a>
    </div>
</body>

</html>
