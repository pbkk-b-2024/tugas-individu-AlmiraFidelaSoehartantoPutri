<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    
</head>
<body>
    <div class="container">
        @include('layout.header')

        <div class="row">
            <div class="col-3">
                @include('layout.sidebar')
            </div>
            <div class="col-9">
                @yield('content')
            </div>
        </div>

        @include('layout.footer')
    </div>
</body>
</html>
