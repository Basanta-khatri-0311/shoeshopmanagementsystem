@vite(['resources/css/app.css', 'resources/js/app.js'])
@livewire('navigation-menu')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Management</title>
    <!-- Include Tailwind CSS styles -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>

<body class=" min-h-screen" style="background-color: #fceadd">

        <h1 class="text-3xl font-bold mb-6 text-center">User Management</h1>

        <table class="min-w-full border border-gray-300 rounded" style="background-color: #dfdada">
            <thead>
                <tr>
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Name</th>
                    <th class="py-2 px-4 border-b">E-mail</th>
                    <th class="py-2 px-4 border-b">Role</th>
                    <th class="py-2 px-4 border-b">User Status</th>
                    <th>Approve</th>
                    <th>Decline</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr >
                        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->name }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->email }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->role }}</td>
                        <td class="py-2 px-4 border-b">{{ $user->user_status }}</td>
                        <td class="py-2 px-4 border-b">
                            <a href="{{ route('admin.approve.user', $user) }}"><svg xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                    class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m4.5 12.75 6 6 9-13.5" />
                                </svg></a>
                        </td>
                        <td>
                            <a href="{{ route('admin.decline.user', $user) }}"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" class="w-5 h-5">
                              <path d="M6.28 5.22a.75.75 0 0 0-1.06 1.06L8.94 10l-3.72 3.72a.75.75 0 1 0 1.06 1.06L10 11.06l3.72 3.72a.75.75 0 1 0 1.06-1.06L11.06 10l3.72-3.72a.75.75 0 0 0-1.06-1.06L10 8.94 6.28 5.22Z" />
                            </svg>
                            
                            </a>

                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>

</html>
