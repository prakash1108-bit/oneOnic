<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css">
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded shadow-md w-96">
            <h1 class="text-2xl font-semibold mb-6">{{ __('Login') }}</h1>
            <form action="{{ route('login') }}" method="POST">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-gray-600">{{ __('Email') }}</label>
                    <input type="email" name="email" id="email"
                        class="w-full border border-gray-300 p-2 rounded">
                    @error('email')
                        <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400"
                            role="alert">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="mb-4">
                    <label for="password" class="block text-gray-600">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password"
                        class="w-full border border-gray-300 p-2 rounded">
                </div>
                <button type="submit" class="bg-blue-500 text-white p-2 rounded">{{ __('Login') }}</button>
            </form>
        </div>
    </div>
</body>

</html>
