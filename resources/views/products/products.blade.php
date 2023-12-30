<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Your products</h1>
    <div>
        <table border="2">
            <tr>
                <th>Id</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Description</th>
                <th>Product Image</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
            @foreach ($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->qty }}</td>
                    <td>{{ $product->price }}</td>
                    <td>{{ $product->description }}</td>
                    <td><img src="{{ asset($product->product_image) }}" alt="{{ $product->name }} Image"></td>
                    <td>
                        <a href="{{ route('product.edit', ['product' => $product]) }}">Edit </a>
                    </td>
                    <td>
                        <form action="{{ route('product.delete', ['product' => $product]) }}" method="POST">
                            @csrf
                            @method('delete')
                            <input type="submit" value="Delete">
                        </form>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div>
        <a href="{{ route('product.add') }}">Add product</a>
    </div>
</body>

</html>
