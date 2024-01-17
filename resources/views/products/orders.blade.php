<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Orders</title>
</head>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<body>
  <h1>Seller Order List</h1>

  @isset($orders)
      @if($orders->isEmpty())
          <p>No orders for your products yet.</p>
      @else
          <table>
              <thead>
                  <tr>
                      <th>Order ID</th>
                      <th>Product</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                    
                  </tr>
              </thead>
              <tbody>
                  @foreach($orders as $order)
                      <tr>
                          <td>{{ $order->id }}</td>
                          <td>{{ $order->product->name }}</td>
                          <td>{{ $order->quantity }}</td>
                          <td>{{ $order->total_price }}</td>
                      </tr>
                  @endforeach
              </tbody>
          </table>
      @endif
  @endisset
  
</body>
</html>