<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <h1>Edit product</h1>
    <div>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>
                        {{ $error }}
                    </li>
                @endforeach
            </ul>
        @endif
    </div>

    <form method="POST" action="{{ route('product.update',['product' =>$product]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div>
            <label>Product Name: </label>
            <input type="text" name="name" placeholder="Name" value="{{ $product->name }}" >
        </div>

        <div>
            <label>Quantity: </label>
            <input type="text" name="qty" placeholder="Qty" value="{{ $product->qty }}">
        </div>

        <div>
            <label>Price: </label>
            <input type="text" name="price" placeholder="Price" value="{{ $product->price }}">
        </div>

        <div>
            <label>Product Description: </label>
            <input type="text" name="description" placeholder="Description" value="{{ $product->description }}">
        </div>

        <div>
            <label>Image: </label>
            <input type="file" name="product_image" placeholder="product_image" value="{{ $product->product_image }}">
        </div>

        <div>
            <input type="submit" value="Update Product">
        </div>
    </form>
</body>

</html>
