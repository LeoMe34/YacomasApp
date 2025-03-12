<!DOCTYPE html>
<html lang="es">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/styles.css') }}">
</head>

<body class="login">

    <div class="container">
        <i class="fa-solid fa-users fa-3x"></i>
        <h2>Administrador</h2>

        @if (session('success'))
            <p class="success">{{ session('success') }}</p>
        @endif

        <form action="{{ route('login') }}" method="POST">
            @csrf


            <input type="email" name="email" placeholder="Correo electronico" required value="{{ old('email') }}">
            @error('email')            <p class="error">{{ $message }}</p> @enderror                




            <input type="password" name="password" placeholder="Contraseña" required>
            @error('password')      <p class="error">{{ $message }}</p> @enderror

            <button type="submit">Iniciar sesión</button>
        </form>
    </div>

</body>

</html>