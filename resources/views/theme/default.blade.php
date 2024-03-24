<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ env('APP_NAME') }}</title>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    @vite('resources/sass/app.scss')
</head>
<body>
    <x-template.navigation />
    <x-template.header />
        <section class="main">
            <div class="main-container main-wrapper">
                @yield('content')
            </div>
        </section>
    <x-template.footer />
</body>
</html>
