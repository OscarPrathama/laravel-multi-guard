<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Multi Guard</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ route('home') }}">Home <span class="sr-only">(current)</span></a>
                </li>

                @if (Route::has('user.login'))
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle" href="#" id="userMenu" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Users
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userMenu">
                            @auth
                                <a class="dropdown-item" href="{{ route('user.home') }}">Home</a>
                            @else
                                <a class="dropdown-item" href="{{ route('user.login') }}">Login</a>
                                    @if (Route::has('user.register'))
                                        <a class="dropdown-item" href="{{ route('user.register') }}">Register</a>
                                    @endif
                            @endauth
                        </div>
                    </li>
                @endif

                @if (Route::has('admin.login'))
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle" href="#" id="adminMenu" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Admin
                        </a>
                        <div class="dropdown-menu" aria-labelledby="adminMenu">
                            @auth
                                <a class="dropdown-item" href="{{ route('admin.home') }}">Home</a>
                            @else
                                <a class="dropdown-item" href="{{ route('admin.login') }}">Login</a>
                                @if (Route::has('admin.register'))
                                    <a class="dropdown-item" href="{{ route('admin.register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    </li>
                @endif

                @if (Route::has('editor.login'))
                    <li class="nav-item dropdown">
                        <a
                            class="nav-link dropdown-toggle" href="#" id="editorMenu" role="button"
                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Editor
                        </a>
                        <div class="dropdown-menu" aria-labelledby="editorMenu">
                            @auth
                                <a class="dropdown-item" href="{{ route('editor.home') }}">Home</a>
                            @else
                                <a class="dropdown-item" href="{{ route('editor.login') }}">Login</a>
                                @if (Route::has('editor.register'))
                                    <a class="dropdown-item" href="{{ route('editor.register') }}">Register</a>
                                @endif
                            @endauth
                        </div>
                    </li>
                @endif


            </ul>
        </div>
    </nav>
</body>
</html>
