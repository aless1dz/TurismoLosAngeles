<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="{{ asset('css/recuperarContrasenia.css') }}">

</head>
<body>
    <div class="container">
        <h1>Recuperación de Contraseña</h1>
        <p>Hemos recibido una solicitud para recuperar tu contraseña. Puedes recuperar tu contraseña a través del siguiente enlace:</p>
        <p style="text-align: center;">
            <a href="{{ route('formulario-actualizar-contrasenia', $token) }}">Recuperar Contraseña</a>
        </p>
        <p>Si no solicitaste la recuperación de contraseña, por favor ignora este mensaje.</p>
        <p>Gracias,<br>El equipo de Turismo Los Angeles</p>
        <div class="footer">
            Este es un correo automático, por favor no respondas a este mensaje.
        </div>
    </div>
</body>
</html>
