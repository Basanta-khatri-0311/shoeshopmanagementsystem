<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Add product</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
@livewire('navigation-menu')
<body class="class="bg-# style= "background-color:#fceadd;">
    <h1 class="text-3xl font-bold mb-4 text-center mt-8">Add products</h1>
    <div class="mx-auto max-w-md">
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="text-red-500">
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="post" action="{{ route('product.store') }}" enctype="multipart/form-data"
    class="max-w-md mx-auto bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('post')
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="name">Product Name: </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            id="name"  type="text" name="name" placeholder="Name">
        </div>

        <div  class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="qty">Quantity: </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
            type="text" name="qty" placeholder="Qty">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="price">Price: </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
             id="price" type="text" name="price" placeholder="Price">
        </div>

        <div class="mb-4">
            <label  class="block text-gray-700 text-sm font-bold mb-2" for="description">Product Description: </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
              id="description"  type="text" name="description" placeholder="Description">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="product_image">Image: </label>
            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
           id="product_image" type="file" name="product_image" placeholder="product_image">
        </div>

        <div class="flex items-center justify-between">
            <input class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
              type="submit" value="Save Product">
        </div>
    </form>
</body>
<footer class="bg-gray-900 text-white py-4 text-center custom-bg ">
    <p>&copy; 2022 FootFashion. All rights reserved.</p>
</footer>
</html>
