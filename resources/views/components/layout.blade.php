<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body>
        <div class="max-w-full bg-black flex">
            <div class="p-6">
                <a href="/" class="text-white uppercase font-bold text-4xl">Predictor</a>
            </div>
            <nav class="flex p-8 my-auto right-0 absolute">
                <ul class="text-xs text-gray-200">
                    @auth
                        <form method="POST" action="/logout">
                            @csrf
                            <button type="submit" class="inline px-2 font-semibold uppercase hover:text-white">Logout</button>
                        </form>
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
        <footer class="bg-black p-6 text-white font-semibold uppercase fixed bottom-0 w-full text-center text-xs">
            Copyright Andy McDonald 2023
        </footer>
        <x-flash />
    </body>
</html>
