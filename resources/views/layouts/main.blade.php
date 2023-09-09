@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://kit.fontawesome.com/68de43edb0.js" crossorigin="anonymous"></script>
    <link rel="icon" href="{{ asset('walrus.ico') }}">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-5" style="background-color: #708CD5;">
    <div class="container-fluid container">
        <a class="navbar-brand text-white">Tusk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('main.index') }}">Главная</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('task.index') }}">Мои задачи</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('done.index') }}">Выполненные задачи</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto">
                @guest()
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('login') }}">Войти</a>
                    </li>
                @endguest
                @auth()
                    @if (auth()->user()->role)
                        <li class="nav-item">
                            <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.index') }}">Админ панель</a>
                        </li>
                    @endif
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="post" class="m-0">
                            @csrf
                            <button type="submit" class="border-0 bg-transparent nav-link active text-white">Выйти</button>
                        </form>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

    <div class="content min-vh-100">
        @yield('content')
    </div>

<footer class="footer bg-dark text-light py-4">
    <div class="container">
        <div class="row">
            <div class="col-md-12 d-flex align-items-center justify-content-center">
                <h4 class="mr-3 mb-0">TUSK</h4>
                <a href="{{ route('main.contacts') }}" class="text-white text-decoration-none mx-3">Контакты</a>
                <a href="{{ route('main.about') }}" class="text-white text-decoration-none mx-3">О нас</a>
                <a href="{{ route('main.policy') }}" class="text-white text-decoration-none">Политика конфиденциальности</a>
            </div>
        </div>
        <hr class="my-4 border-light">
        <div class="row">
            <div class="col-md-12 text-center">
                <p>&copy; 2023 TUSK. Все права защищены.</p>
            </div>
        </div>
    </div>
</footer>

</body>
</html>
