<!DOCTYPE html>
<html>
<head>
    <title>Restablecer contraseña</title>
</head>
<body>
    <h2>Restablecer contraseña</h2>
    <form action="{{ route('Auth.update') }}" method="POST">
        @csrf
        <input type="hidden" name="token" value="{{ $token }}">
        <div>
            <label for="email">Correo electrónico</label>
            <input type="email" name="email" id="email" value="{{ $email ?? old('email') }}" required>
        </div>
        <div>
            <label for="password">Nueva contraseña</label>
            <input type="password" name="password" id="password" required>
        </div>
        <div>
            <label for="password_confirmation">Confirmar contraseña</label>
            <input type="password" name="password_confirmation" id="password_confirmation" required>
        </div>
        <div>
            <button type="submit">Restablecer contraseña</button>
        </div>
    </form>
</body>
</html>
