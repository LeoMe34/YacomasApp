<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicación de Personas</title>
    <!-- Aquí puedes incluir tus hojas de estilo (CSS) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABQ1z7T2K4v24p3I1B8zL3uU4zM3aCZ6LF2V28WJ12jGGdP1z5U4Hqq" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

</head>

<body>
    <div class="container">
        <!-- Barra de navegación, si lo necesitas -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ url('user.dashboard') }}">Mi Aplicación</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{ route('personas.index') }}">Lista de Personas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('personas.create') }}">Agregar Persona</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Si hay un mensaje de éxito o error, se muestra aquí -->
        @if(session('success'))
            <div class="alert alert-success mt-3">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger mt-3">
                {{ session('error') }}
            </div>
        @endif

        <!-- Contenido de la página, que se sobrecarga en cada vista -->
        <div class="mt-4">
            @yield('content')
        </div>
    </div>

    <!-- Scripts de JavaScript (incluyendo Bootstrap) -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
        integrity="sha384-oBqDVmMz4fnFO9gyb9fFh3tQq6bHh9dH7H8ltxg5L7rVd6T1d9fuVeF9QeI5w9y5D"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
        integrity="sha384-cn7l7gDp0eyzXzV7C5T92xlk8NfwVSC5Q82aC93Ao3pkW28lX64p9l0D8XkwPfGK"
        crossorigin="anonymous"></script>
</body>

</html>