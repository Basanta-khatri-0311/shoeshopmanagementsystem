<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Manage products</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>
@livewire('navigation-menu')
<body style="background-color:#fceadd;">
    <div class="container mx-auto p-4">

        <div class="flex justify-between items-center mb-4">
            <h1 class="text-3xl font-bold flex-grow text-center">Your products</h1>
            <a href="{{ route('product.add') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">Add product</a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full table-auto border-collapse border border-gray-500">
                <tr>
                    <th class="border border-gray-500 px-4 py-2">Id</th>
                    <th class="border border-gray-500 px-4 py-2">Product Name</th>
                    <th class="border border-gray-500 px-4 py-2">Quantity</th>
                    <th class="border border-gray-500 px-4 py-2">Price</th>
                    <th class="border border-gray-500 px-4 py-2">Description</th>
                    <th class="border border-gray-500 px-4 py-2">Product Image</th>
                    <th class="border border-gray-500 px-4 py-2">Actions</th>
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
                        <div class="flex justify-center">
                            <a href="{{ route('product.edit', ['product' => $product]) }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-1 px-3 rounded-full mx-1"><i class="fas fa-edit"></i></a>
                            <form action="{{ route('product.delete', ['product' => $product]) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-3 rounded-full mx-1"><i class="fas fa-trash-alt"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </table>
        </div>
        <div class="mt-4">
            {{ $products->links() }}
        </div>
    </div>
  
</body>
<footer class="bg-gray-900 text-white py-4 text-center custom-bg">
    <p>&copy; 2022 FootFashion. All rights reserved.</p>
</footer>
</html>
