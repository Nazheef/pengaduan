<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                <!-- Tailwind CSS -->
                <script src="https://cdn.tailwindcss.com"></script>
            </head>
            <body class="bg-gradient-to-br from-blue-100 via-purple-100 to-pink-100 min-h-screen">
                <div id="app">
                    <nav class="bg-white shadow-md py-4 mb-8">
                        <div class="container mx-auto flex justify-between items-center px-4">
                            <a class="text-xl font-bold text-blue-500" href="{{ url('/') }}">
                                {{ config('app.name', 'Laravel') }}
                            </a>
                            <div>
                                @auth
                                    <span class="text-gray-600 mr-4">Hi, {{ Auth::user()->nama ?? Auth::user()->username }}</span>
                                    <a href="{{ route('logout') }}" class="px-4 py-2 bg-pink-400 hover:bg-pink-500 text-white rounded-lg transition duration-200">Logout</a>
                                @else
                                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-400 hover:bg-blue-500 text-white rounded-lg transition duration-200">Login</a>
                                @endauth
                            </div>
                        </div>
                    </nav>
                    <main>
                        @yield('content')
                    </main>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
             </body>
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
