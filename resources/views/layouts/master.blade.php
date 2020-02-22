<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Tech Test</title>
    <link href="{{ asset('css/app.css')}}" rel="stylesheet">
</head>
 
<body>
 
<nav class="navbar navbar-toggleable-md navbar-light bg-faded">
    <div class="collapse navbar-collapse">    
    </div>
</nav>
 
<div class="container">
    @yield('content')
</div>
 
<footer class="footer">
    <div class="container">
    </div>
</footer>
 
<script src="{{ asset('js/app.js')}}" type="text/javascript"></script>
</body>
</html>
