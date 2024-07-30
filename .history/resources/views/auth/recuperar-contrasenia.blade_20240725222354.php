<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="{{ asset('css/recuperarContrasenia.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>
<div class="container">
        <div class="email-container">
            <h1 class="text-center">Recuperación de Contraseña</h1>
            <p>Hemos recibido una solicitud para recuperar tu contraseña. Puedes recuperar tu contraseña a través del siguiente enlace:</p>
            <div class="text-center">
                <a href="{{ route('formulario-actualizar-contrasenia', $token) }}" class="btn btn-primary">Recuperar Contraseña</a>
            </div>
            <p class="mt-3">Si no solicitaste la recuperación de contraseña, por favor ignora este mensaje.</p>
            <p>Gracias,<br>El equipo de [Nombre de la Empresa]</p>
            <div class="footer">
                Este es un correo automático, por favor no respondas a este mensaje.
            </div>
        </div>
    </div>
</body>
</html>
