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
    <title>Задачи</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid container">
        <a class="navbar-brand">Tusk</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse d-flex justify-content-between" id="navbarNavAltMarkup">
            <div class="navbar-nav">
                <a class="nav-link active" aria-current="page" href="{{ route('main.index') }}">Главная</a>
                <a class="nav-link active" aria-current="page" href="{{ route('task.index') }}">Мои задачи</a>
                <a class="nav-link active" aria-current="page" href="{{ route('done.index') }}">Выполненные задачи</a>
            </div>
            <div class="navbar-nav">
                @guest()
                    <a class="nav-link active" aria-current="page" href="{{ route('login') }}">Войти</a>
                @endguest
                @auth()
                    @if (auth()->user()->role)
                        <a class="nav-link active" aria-current="page" href="{{ route('admin.index') }}">Админ панель</a>
                    @endif
                    <form action="{{ route('logout') }}" method="post">
                        @csrf
                        <input type="submit" value="Выйти" class="border-0 bg-transparent nav-link active">
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>

@yield('content')

</body>
</html>
