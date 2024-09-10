
<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Église - Connexion</title>
        <link href="https://cdn.jsdelivr.net/npm/tailwindcss@3.0.0/dist/tailwind.min.css" rel="stylesheet">
        <style>
            body {
                background-image: url('https://example.com/path/to/your/background-image.jpg');
                background-size: cover;
                background-position: center;
            }
        </style>
    </head>
    <body class="flex items-center justify-center min-h-screen p-6">
        <div class="w-full max-w-md p-8 bg-white rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold text-center text-gray-800 mb-6">Connexion à l'Église</h2>
    
            <form method="POST" action="{{ route('login') }}" class="space-y-6">
                @csrf
    
                <!-- Email Address -->
                <div>
                    <label for="email" class="block text-sm font-medium text-gray-700">{{ __('Email') }}</label>
                    <input id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username" 
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('email')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Password -->
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">{{ __('Password') }}</label>
                    <input id="password" type="password" name="password" required autocomplete="current-password"
                           class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    @error('password')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
    
                <!-- Remember Me -->
                <div class="flex items-center">
                    <input id="remember_me" type="checkbox" name="remember" class="h-4 w-4 text-indigo-600 focus:ring-indigo-500 border-gray-300 rounded">
                    <label for="remember_me" class="ml-2 block text-sm text-gray-900">{{ __('Remember me') }}</label>
                </div>
    
                <div class="flex items-center justify-between">
                    @if (Route::has('password.request'))
                        <a href="{{ route('password.request') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif
    
                    <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-base font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                        {{ __('Log in') }}
                    </button>
                </div>
    
                <div class="flex justify-center">
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-sm text-indigo-600 hover:text-indigo-800">
                            Nouveau ici ? Inscrivez-vous
                        </a>
                    @endif
                </div>
            </form>
        </div>
    </body>
    </html>
    
</x-guest-layout>




