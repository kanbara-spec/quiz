<!DOCTYPE HTML>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>soccerquiz</title>
         <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link href="/css/style.css" rel="stylesheet">
    </head>
    <body>
        
        <nav id="nav">
            <ul>
                <li><a href="/">トップに戻る</a></li>
                <li><a href="/posts/create">問題を作る</a></li>
                <li><a href="/posts/show">問題を解く</a></li>
            </ul>
        </nav>
        
        <div id="hamburger">
            <span class="inner_line" id="line1"></span>
            <span class="inner_line" id="line2"></span>
            <span class="inner_line" id="line3"></span>
        </div>
        
        {{ $slot }}
        
        <script src="/js/main.js"></script>
    </body>
</html>