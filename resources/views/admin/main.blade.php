<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        {{-- @vite(['resources/js/admin.js']) --}}

</head>

<body>
    <nav data-bs-theme="primary" class="navbar bg-primary navbar-expand-lg">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Админка</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Главная</a>
                    </li>

                    {{-- <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Добавить из
                </a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href="#">Ссылка</a></li>
                  <li><a class="dropdown-item" href="#">Файл</a></li>
                  
                </ul>
              </li> --}}

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard.import') }}">Добавить</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.dashboard.categories') }}">Категории</a>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#">Товары</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Пользователи</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{route('admin.orders.index')}}">Заказы</a>
                    </li>

                </ul>

            </div>
        </div>
    </nav>
    <div class="container">
        <div class="my-2">
            @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif
        </div>
        @yield('content')
    </div>
    
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
