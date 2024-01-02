<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shoe Management Services</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
        }
        .fixed-top {
            position: fixed;
            top: 0;
            width: 100%;
            z-index: 10;
        }
        main {
            margin-top: 64px; 
        }
      
        .service-card img {
            max-width: 100%;
            height: auto;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen antialiased" style="background-color: #fceadd;">

    <!-- Navigation -->
    <header class="bg-white shadow-md fixed-top">
        <nav class="container mx-auto py-4">
            <ul class="flex justify-center space-x-6">
                <li><a href="/" class="text-gray-700 hover:text-gray-900">Home</a></li>
                <li><a href="#" class="text-gray-700 hover:text-gray-900">Services</a></li>
                <li><a href="{{ route('aboutus.index') }}" class="text-gray-700 hover:text-gray-900">About Us</a></li>
                <li><a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-gray-900">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-4">
        <h1 class="text-4xl font-bold mb-6 text-center">Our Shoe Management Services</h1>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
          <!-- Service Card 1 -->
          <div class="bg-white rounded-lg shadow-md p-6 service-card">
              <img src="https://cdn.pixabay.com/photo/2023/10/21/08/14/service-8330969_1280.png" alt="Inventory Management" class="mx-auto mb-4">
              <h2 class="text-xl font-semibold mb-4">Inventory Management</h2>
              <p class="text-gray-700 mb-4">Efficiently manage your shoe inventory with our advanced inventory management system.</p>
              <a href="#" class="block text-center bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Learn More</a>
          </div>

          <!-- Service Card 2 -->
          <div class="bg-white rounded-lg shadow-md p-6 service-card">
              <img src="https://cdn.pixabay.com/photo/2019/10/10/18/12/service-4540203_1280.jpg" alt="Order Tracking" class="mx-auto mb-4">
              <h2 class="text-xl font-semibold mb-4">Order Tracking</h2>
              <p class="text-gray-700 mb-4">Track orders seamlessly and provide your customers with real-time updates on their purchases.</p>
              <a href="#" class="block text-center bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Learn More</a>
          </div>

          <!-- Service Card 3 -->
          <div class="bg-white rounded-lg shadow-md p-6 service-card">
              <img src="https://cdn.pixabay.com/photo/2022/02/12/11/41/feedback-7008828_1280.png" alt="Customer Support" class="mx-auto mb-4">
              <h2 class="text-xl font-semibold mb-4">Customer Support</h2>
              <p class="text-gray-700 mb-4">Offer top-notch customer support to assist with any shoe-related queries or issues.</p>
              <a href="#" class="block text-center bg-blue-500 text-white px-4 py-2 rounded-md hover:bg-blue-600">Learn More</a>
          </div>
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-4 text-center">
        <p>&copy; 2022 Your Shoe Management System. All rights reserved.</p>
    </footer>

</body>

</html>
