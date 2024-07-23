<!DOCTYPE html>
<html>
<head>
    <title>Olvidé mi contraseña</title>
</head>
<body>
    <h2>Olvidé mi contraseña</h2>
    <form action="{{ route('password.email') }}" method="POST">
        @csrf
        <div>
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" required>
        </div>
        <div>
            <button type="submit">Enviar enlace de restablecimiento</button>
        </div>
    </form>
</body>
</html>
