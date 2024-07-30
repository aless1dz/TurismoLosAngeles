<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu dirección de correo electrónico</title>
    <style>
        /* Estilos básicos para asegurar que el correo se vea bien en la mayoría de los clientes */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            padding: 20px;
            background-color: #ffffff;
            margin: 20px auto;
            max-width: 600px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            color: #333333;
            text-align: center;
            font-size: 24px;
            margin-bottom: 20px;
        }
        p {
            color: #555555;
            font-size: 16px;
            line-height: 1.5;
            margin-bottom: 20px;
        }
        a {
            display: inline-block;
            padding: 10px 20px;
            font-size: 16px;
            color: #ffffff;
            background-color: #007bff;
            text-decoration: none;
            border-radius: 4px;
            text-align: center;
        }
        a:hover {
            background-color: #0056b3;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888888;
            margin-top: 20px;
        }
    </style>
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
