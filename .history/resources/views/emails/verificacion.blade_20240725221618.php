<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu dirección de correo electrónico</title>
    <link rel="stylesheet" href="{{ asset('css/correoVerificacion.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">


</head>
<body>
    <div class="container">
        <div class="email-container">
            <h1 class="text-center">Bienvenido a nuestra plataforma</h1>
            
            <p>Gracias por registrarte. Por favor, verifica tu dirección de correo electrónico haciendo clic en el siguiente enlace:</p>
            
            <div class="text-center">
                <a href="{{ $verificationLink }}" class="btn btn-primary">Verificar mi correo electrónico</a>
            </div>
            
            <p>Si no has creado una cuenta en nuestra plataforma, puedes ignorar este mensaje.</p>
            
            <p>Saludos,<br>El equipo de Turismo Los Angeles</p>
            
            <div class="footer">
                Este es un correo automático, por favor no respondas a este mensaje.
            </div>
        </div>
    </div>
</body>
</html>
