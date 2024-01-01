
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <style>
        .my-section {
            background-color: #fceadd; 
        }
    </style>
</head>
<body>
    <div class="my-section">
        <x-guest-layout>
            <x-authentication-card>
                <x-validation-errors class="mb-4" />
        
                @if (session('status'))
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ session('status') }}
                    </div>
                @endif
        
                <form method="POST" action="{{ route('login') }}" class="mt-8">
                    @csrf
        
                    <div class="mb-4">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input id="email" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    </div>
        
                    <div class="mb-4">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" type="password" name="password" required autocomplete="current-password" />
                    </div>
        
                    <div class="mb-4">
                        <label for="role" class="block text-sm font-medium text-gray-700">Role</label>
                        <select id="role" name="role" class="block mt-1 w-full rounded-md border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            <option value="" disabled selected>Select Role</option>
                            <option value="customer">Customer</option>
                            <option value="trader">Trader</option>
                        </select>
                    </div>
                    
                    <div class="block mt-4">
                        <label for="remember_me" class="flex items-center">
                            <input id="remember_me" name="remember" type="checkbox" class="rounded border-gray-300 text-indigo-600 focus:ring-indigo-500" />
                            <span class="ms-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                        </label>
                    </div>
        
                    <div class="flex items-center justify-between mt-4">
                        @if (Route::has('password.request'))
                            <a class="text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                                {{ __('Forgot your password?') }}
                            </a>
                        @endif
        
                        <button type="submit" class="text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-6 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Log in') }}
                        </button>
                        <div class="text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 rounded-md py-2 px-6 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            <a href="{{ route('register') }}" >Register</a>
                        </div>
                    </div>
                </form>
            </x-authentication-card>
        </x-guest-layout>
    </div>
</body>
</html>