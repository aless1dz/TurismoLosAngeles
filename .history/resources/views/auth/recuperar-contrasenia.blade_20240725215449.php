<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <style>
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
