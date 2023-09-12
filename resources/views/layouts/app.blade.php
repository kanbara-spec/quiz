<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
        <!-- Scripts -->
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100">
            @include('layouts.navigation')


            <!-- Page Content -->
            <main>
                <nav id="nav">
                    <ul>
                        <li><a href="/">トップに戻る</a></li>
                        <li><a href="/posts/mypage">MyPage</a></li>
                        <li><a href="/posts/create">問題を作る</a></li>
                        <li><a id="I" href="/posts/show">問題を解く</a></li>
                    </ul>
                </nav>
                    
                <div id="hamburger">
                    <span class="inner_line" id="line1"></span>
                    <span class="inner_line" id="line2"></span>
                    <span class="inner_line" id="line3"></span>
                </div>
                
                
                {{ $slot }}
            </main>
        </div>
        
        <script src="/js/main.js"></script>
    </body>
</html>
