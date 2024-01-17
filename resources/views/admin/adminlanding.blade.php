@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color:#fceadd; /* Set your preferred background color */
        }

        .container {
            max-width: 600px;
            margin: 0 auto;
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h1 {
            font-size: 2rem;
            color: #4a5568; /* Set your preferred text color */
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>You are logged in as admin</h1>
    </div>
</body>

</html>
