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
