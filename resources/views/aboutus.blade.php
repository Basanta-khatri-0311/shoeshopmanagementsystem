<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Shoe Management</title>
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
        body {
            background-image: url('https://cdn.pixabay.com/photo/2014/04/02/10/39/sneaker-304119_1280.png');
            background-size: cover;
            background-repeat: no-repeat;
        }
        /* Flexbox styles to push footer to the bottom */
        .flex-container {
            display: flex;
            flex-direction: column;
            min-height: 100vh;
        }
        .content {
            flex: 1;
        }

        
        /* Style for the "About Us" section */
        .about-section {
            background-color: rgba(252, 234, 221, 0.8);
            padding: 50px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 700px;
        }
        footer {
            background-color: rgba(0, 0, 0, 0.8);
            color: white;
            padding: 20px 0;
            text-align: center;
            width: 100%;
            margin-top: auto;
        }
    </style>
</head>

<body class="flex flex-col min-h-screen antialiased">

    <!-- Navigation -->
    <header class="bg-white shadow-md fixed-top">
        <nav class="container mx-auto py-4">
            <ul class="flex justify-center space-x-6">
                <li><a href="/" class="text-gray-700 hover:text-gray-900">Home</a></li>
                <li><a href="/service" class="text-gray-700 hover:text-gray-900">Services</a></li>
                <li><a href="/about-us" class="text-gray-700 hover:text-gray-900">About Us</a></li>
                <li><a href="/contacts" class="text-gray-700 hover:text-gray-900">Contacts</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto py-8 px-4">
        <section class="about-section py-16">
            <div class="max-w-3xl mx-auto text-center">
                <h1 class="text-4xl font-bold mb-6">About Our Shoe Management Shop</h1>
                <p class="text-gray-700 mb-6">
                    We are dedicated to providing the best shoe management solutions to our customers. With a team of 
                    experienced professionals, we aim to streamline the shoe inventory and order tracking process.
                </p>
                <p class="text-gray-700 mb-6">
                    Our commitment is to deliver exceptional services that meet the unique needs of shoe sellers and 
                    enthusiasts. We focus on innovation, efficiency, and customer satisfaction.
                </p>
                <p class="text-gray-700">
                    For any inquiries or collaborations, feel free to reach out to us.
                </p>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-gray-900 text-white py-4 text-center">
        <p>&copy; 2022 Your Shoe Management System. All rights reserved.</p>
    </footer>

</body>

</html>
