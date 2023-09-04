@vite(['resources/sass/app.scss', 'resources/js/app.js'])

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="{{ asset('walrus.ico') }}">
    <title>@yield('title')</title>
</head>
<body>
<nav class="navbar navbar-expand-lg mb-5" style="background-color: #708CD5;">
    <div class="container-fluid container">
        <a class="navbar-brand text-white">Tusk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active text-white" aria-current="page" href="{{ route('main.index') }}">Главная</a>
                <a class="nav-link active text-white" aria-current="page" href="{{ route('task.index') }}">Мои задачи</a>
                <a class="nav-link active text-white" aria-current="page" href="{{ route('done.index') }}">Выполненные задачи</a>
            </div>
            <div class="navbar-nav">
                @guest()
                    <a class="nav-link active text-white" aria-current="page" href="{{ route('login') }}">Войти</a>
                @endguest
                @auth()
                    @if (auth()->user()->role)
                        <a class="nav-link active text-white" aria-current="page" href="{{ route('admin.index') }}">Админ панель</a>
                    @endif
                    <form action="{{ route('logout') }}" method="post" class="m-0">
                        @csrf
                        <input type="submit" value="Выйти" class="border-0 bg-transparent nav-link active text-white">
                    </form>
                @endauth
            </div>
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
                <a href="#" class="text-white text-decoration-none mx-3">Контакты</a>
                <a href="#" class="text-white text-decoration-none mx-3">О нас</a>
                <a href="#" class="text-white text-decoration-none">Политика конфиденциальности</a>
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

<script src="https://kit.fontawesome.com/68de43edb0.js" crossorigin="anonymous"></script>
</body>
</html>
