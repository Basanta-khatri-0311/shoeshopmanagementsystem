<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
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
    </style>
</head>

<body class="flex flex-col min-h-screen antialiased" style= "background-color: #fceadd">

    <header class="bg-white shadow-md fixed-top">
        <nav class="container mx-auto py-4">
            <ul class="flex justify-center space-x-6">
                <li><a href="/" class="text-gray-700 hover:text-gray-900">Home</a></li>
                <li><a href="{{ route('services.index') }}" class="text-gray-700 hover:text-gray-900">Service</a></li>
                <li><a href="{{ route('aboutus.index') }}" class="text-gray-700 hover:text-gray-900">About Us</a></li>
                <li><a href="{{ route('contact.index') }}" class="text-gray-700 hover:text-gray-900">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <main class="flex-grow container mx-auto py-8 px-4 flex justify-center items-center flex-col md:flex-row">
        <div class="md:w-1/2 text-center md:text-left md:pr-8">
            <h1 class="text-4xl font-bold mb-4">Welcome to FootFashion</h1>
            <p class="text-lg text-gray-700 mb-8">
                Your number one destination for shoe management. Explore our website to learn more about our services,
                get started, and find your perfect pair of shoes.
            </p>
            <div class="flex justify-center md:justify-start">
                <a href="" class="bg-blue-500 text-white px-8 py-4 rounded-lg mr-4 hover:bg-blue-600" id="getStartedButton">Get Started</a>
                <a href="#" class="bg-gray-700 text-white px-8 py-4 rounded-lg hover:bg-gray-800">Learn More</a>
            </div>
        </div>
        <div class="md:w-1/2 flex justify-center">
            <img src="https://cdn.pixabay.com/photo/2021/05/15/10/59/fashion-6255516_1280.jpg" alt="Shoes Logo" class="rounded-lg">
        </div>
    </main>

    <footer class="bg-gray-900 text-white py-4 text-center custom-bg">
        <p>&copy; 2022 FootFashion. All rights reserved.</p>
    </footer>

</body>

</html>





<script>
    document.getElementById('getStartedButton').addEventListener('click', function(event) {
        event.preventDefault();
        @auth
        window.location.href = "{{ url('/dashboard') }}"; // Redirect to dashboard if authenticated
    @else
        window.location.href = "{{ route('login') }}"; // Redirect to login if not authenticated
    @endauth
    });
</script>
