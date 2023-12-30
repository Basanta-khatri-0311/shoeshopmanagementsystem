<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  <h1>Add products</h1>

  <form action="post" action="{{route('product.add')}}" >
    @csrf
    @method('post')
    <div>
      <label >Product Name: </label>
      <input type="text" name="name" placeholder="Name">
    </div>

    <div>
      <label >Quantity: </label>
      <input type="text" name="qty" placeholder="Qty">
    </div>

    <div>
      <label >Price: </label>
      <input type="text" name="price" placeholder="Price">
    </div>

    <div>
      <label >Product Description: </label>
      <input type="text" name="description" placeholder="Description">
    </div>

    <div>
      <label >Image: </label>
      <input type="file" name="product_image" placeholder="product_image">
    </div>

    <div>
      <input type="submit" value="Save Product" >
    </div>
  </form>
</body>
</html>