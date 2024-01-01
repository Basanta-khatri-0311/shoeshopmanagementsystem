<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Us - Shoe Management</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        html,
        body {
            height: 100%;
            margin: 0;
            font-family: Arial, sans-serif;
        }
      
   
        body {
            background-size: cover;
            background-repeat: no-repeat;
            display: flex;
            flex-direction: column;
        }
        /* Contact form styles */
        .contact-form {
            background-color: rgba(252, 234, 221, 0.8);
            padding: 50px;
            border-radius: 10px;
            margin: 20px auto;
            max-width: 600px;
        }
        /* Footer styles */
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

<body>
    <!-- Navigation -->
    <header class="bg-white shadow-md fixed-top">
        <nav class="container mx-auto py-4">
            <ul class="flex justify-center space-x-6">
                <li><a href="/" class="text-gray-700 hover:text-gray-900">Home</a></li>
                <li><a href="{{ route('services.index') }}" class="text-gray-700 hover:text-gray-900">Services</a></li>
                <li><a href="{{ route('aboutus.index') }}" class="text-gray-700 hover:text-gray-900">About Us</a></li>
                <li><a href="#" class="text-gray-700 hover:text-gray-900">Contact Us</a></li>
            </ul>
        </nav>
    </header>

    <!-- Main Content -->
    <main class="flex-grow">
        <section class="contact-form mx-auto">
            <div class="text-center">
                <h1 class="text-4xl font-bold mb-6">Contact Us</h1>
                <form>
                    <div class="mb-4">
                        <label for="name" class="block text-lg mb-2">Name</label>
                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-lg mb-2">Email</label>
                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border rounded-md">
                    </div>
                    <div class="mb-4">
                        <label for="message" class="block text-lg mb-2">Message</label>
                        <textarea id="message" name="message" rows="4" class="w-full px-4 py-2 border rounded-md"></textarea>
                    </div>
                    <div class="submit-button">
                      <button type="submit" class="bg-blue-500 text-white px-6 py-3 rounded-md hover:bg-blue-600">Submit</button>
                    </div>
                </form>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer>
        <p>&copy; 2022 Your Shoe Management System. All rights reserved.</p>
    </footer>
</body>

</html>
