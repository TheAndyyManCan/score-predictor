<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="max-w-full bg-black flex">
            <div>
                <h2 class="text-white text-4xl p-6">Predictor</h2>
            </div>
            <nav class="flex p-8 my-auto right-0 absolute">
                <ul class="text-xs text-gray-200">
                    @auth
                        <x-nav-link link="/logout">Logout</x-nav-link>
                    @else
                        <x-nav-link link="/login">Login</x-nav-link>
                        <x-nav-link link="/register">Register</x-nav-link>
                    @endauth
                </ul>
            </nav>
        </div>
        <main>
            {{ $slot }}
        </main>
    </body>
    <footer class="bg-black p-6 text-white font-semibold uppercase absolute bottom-0 w-full text-center text-xs">
        Copyright Andy McDonald 2023
    </footer>
</html>
