<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verificar Correo Electrónico</title>
</head>
<body>
    <h1>Verifica tu dirección de correo electrónico</h1>
    <p>Te hemos enviado un correo electrónico con un enlace de verificación. Por favor, revisa tu bandeja de entrada.</p>

    <form method="POST" action="{{ route('verification.send') }}">
        @csrf
        <button type="submit">Reenviar correo de verificación</button>
    </form>
</body>
</html>
