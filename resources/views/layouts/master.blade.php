<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width">
    <title>Seatly - Ticket Booking System</title>
    <meta name="description" content="Seatly">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{ load_asset('css/landing-page.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-social/4.12.0/bootstrap-social.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/css/font-awesome.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.4.0/fonts/fontawesome-webfont.ttf">
    <link rel="stylesheet" href="{{ load_asset('css/main.css') }}">
    <link rel="stylesheet" href="{{ load_asset('css/theme.css') }}">
    <link rel="stylesheet" href="{{ load_asset('plugins/jquery.seatcharts/jquery.seat-charts.css') }}">
    <link rel="stylesheet" href="{{ load_asset('plugins/jquery.seatcharts/style.css') }}">
    <script src="https://code.jquery.com/jquery-1.12.1.min.js"></script>
</head>
<body>
    @include('layouts.partials.navbar')
    <div class="container">
        @yield('content')
    </div>
    <footer class="footer">
        <div class="container text-center">
        <p class="pull-left">© 2016 Liam Reed</p>
        <ul class="pull-right list-inline">
            <li>
                <a href="https://github.com/liamreed/seatly-cinema-booking">GitHub</a>
            </li>
        </ul>
        </div>
    </footer>

</body>
</html>
@include('layouts.partials.js')