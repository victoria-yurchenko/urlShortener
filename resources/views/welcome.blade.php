<!DOCTYPE html>
<html>

<head>
    <title>URL Shortener</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    <script src="{{ mix('js/app.js') }}" defer></script>
</head>

<body>
    <div id="app" class="container mt-5">
        <url-shortener></url-shortener>
    </div>
</body>

</html>