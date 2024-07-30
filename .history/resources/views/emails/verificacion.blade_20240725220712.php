<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu dirección de correo electrónico</title>
    <link rel="stylesheet" href="{{ asset('css/correoVerificacion.css') }}">

</head>
<body>
    <div class="container">
        <h1>Bienvenido a nuestra plataforma</h1>
        
        <p>Gracias por registrarte. Por favor, verifica tu dirección de correo electrónico haciendo clic en el siguiente enlace:</p>
        
        <p style="text-align: center;">
            <a href="{{ $verificationLink }}">Verificar mi correo electrónico</a>
        </p>
        
        <p>Si no has creado una cuenta en nuestra plataforma, puedes ignorar este mensaje.</p>
        
        <p>Saludos,<br>El equipo de Turismo Los Angeles</p>
        
        <div class="footer">
            Este es un correo automático, por favor no respondas a este mensaje.
        </div>
    </div>
</body>
</html>
