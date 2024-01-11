<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <title>Your Orders</title>

</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')

<body style="background-color:#fceadd;">
    <div class="container mx-auto p-4">
        <h1 class="text-3xl font-bold flex-grow text-center">Your Orders</h1>
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
                {{-- @foreach ($orders as $order) --}}
                    <td class="border border-gray-500 px-4 py-2"></td>
                {{-- @endforeach --}}
            </table>
        </div>
    </div>


</body>
<footer class="bg-gray-900 text-white py-4 text-center custom-bg">
    <p>&copy; 2022 FootFashion. All rights reserved.</p>
</footer>

</html>
