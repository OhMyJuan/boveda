<!-- resources/views/layouts/app.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Bóveda de Contraseñas')</title>
    <!-- Agrega cualquier otra meta, links a CSS o scripts aquí -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- O cualquier otro CSS que estés utilizando -->
</head>
<body>
    <div class="container">
        <!-- Menú de navegación -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light d-flex justify-content-between">
            @auth
            <a class="navbar-brand d-block" href="{{ route('home') }}">Bóveda de Contraseñas</a>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button class="nav-link" type="submit">Cerrar sesión</button>
                        </form>
                    </li>
                </ul>
            </div>
            @else
            <a class="navbar-brand d-block" href="/">Bóveda de Contraseñas</a>
            @endauth
        </nav>

        <!-- Contenido dinámico -->
        <div class="mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Scripts de Bootstrap o JavaScript adicional -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
