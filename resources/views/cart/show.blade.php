<html>


@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')

<body style="background-color:#fceadd">
    <div class="container mx-auto my-8 mt-20px flex">
        <!-- Cart Table -->
        <div class="flex-1">
            <h1 class="text-3xl font-semibold mb-6">Your Cart</h1>

            @if ($cartItems->isEmpty())
                <div class="text-gray-600 flex items-center justify-center h-64">
                    <p class="text-center">Your cart is empty.</p>
                </div>
            @else
                <table class="min-w-full border divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Price
                                at Purchase</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Image
                            </th>
                            <!-- Add other table headers as needed -->
                            <th scope="col" class="relative px-6 py-3"></th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($cartItems as $index => $cartItem)
                            <form action="{{ route('cart.update', $cartItem->product->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                                <input type="hidden" name="index" value="{{ $index }}">
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="flex items-center">
                                            <div class="flex-shrink-0 h-16 w-16">
                                                <img class="h-16 w-16 rounded-full object-cover"
                                                    src="{{ $cartItem->product->product_image }}"
                                                    alt="{{ $cartItem->product->name }}">
                                            </div>
                                            <div class="ml-4">
                                                <div class="text-sm font-medium text-gray-900">
                                                    {{ $cartItem->product->name }}
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            <form action="{{ route('cart.update', $cartItem->product->id) }}"
                                                method="POST">
                                                @csrf
                                                @method('PATCH')

                                                <button type="submit" name="quantity"
                                                    value="{{ $cartItem->quantity - 1 }}"
                                                    class="inline-block px-2 py-1 text-sm font-semibold text-gray-700 hover:text-gray-900 focus:outline-none">
                                                    -
                                                </button>

                                                <span class="mx-2">{{ $cartItem->quantity }}</span>

                                                <button type="submit" name="quantity"
                                                    value="{{ $cartItem->quantity + 1 }}"
                                                    class="inline-block px-2 py-1 text-sm font-semibold text-gray-700 hover:text-gray-900 focus:outline-none">
                                                    +
                                                </button>
                                            </form>
                                        </div>
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <div class="text-sm text-gray-900">
                                            ${{ number_format($cartItem->price_at_purchase, 2) }}
                                        </div>
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap">
                                        <!-- Add logic to display the first image of the product -->
                                        <img class="h-16 w-16 rounded-full object-cover"
                                            src="{{ $cartItem->product->product_image }}"
                                            alt="{{ $cartItem->product->name }}">
                                    </td>
                                    <!-- Add other table cells with product details as needed -->
                                    <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                        <form action="{{ route('cart.remove', $cartItem->product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="text-red-500 hover:text-red-700 focus:outline-none">
                                                Remove
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            </form>
                        @endforeach
                    </tbody>
                </table>

        </div>
        <div class="w-8"></div>
        <div class="flex">


            <!-- Receipt Table -->
            <div class="flex-1 ml-8 mt-20px">
                <h2 class="text-2xl font-semibold mb-4">Receipt</h2>

                <table class="min-w-full border divide-y divide-gray-200 mb-4">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Product</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Quantity</th>
                            <th scope="col"
                                class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Total
                                Price</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        <!-- Loop through cart items to display receipt -->
                        @foreach ($cartItems as $cartItem)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm font-medium text-gray-900">
                                        {{ $cartItem->product->name }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        {{ $cartItem->quantity }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">
                                        ${{ number_format($cartItem->quantity * $cartItem->price_at_purchase, 2) }}
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="flex justify-between items-center mt-8">
                    <div>
                        <h2 class="text-2xl font-semibold">Grand Total</h2>
                        <div class="text-lg font-medium text-gray-900">
                            ${{ number_format(
                                $cartItems->sum(function ($cartItem) {
                                    return $cartItem->quantity * $cartItem->price_at_purchase;
                                }),
                                2,
                            ) }}
                        </div>
                    </div>

                    <!-- Checkout Button -->
                    <div class="text-right mt-4">
                        <form action="{{ route('checkout') }}" method="POST">
                            @csrf

                            <button type="submit"
                                class="bg-blue-500 text-white px-4 py-2 rounded-full hover:bg-blue-700">
                                Checkout
                            </button>
                        </form>
                    </div>

                </div>
            </div>
            @endif
        </div>
    </div>
</body>
</html>