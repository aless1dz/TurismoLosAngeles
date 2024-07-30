<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Verifica tu correo electrónico</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <style>
        body {
            background-color: #f2f4f6;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
            max-width: 600px;
            margin: 20px auto;
            border: 1px solid #e1e5e8;
        }
        .header {
            text-align: center;
            padding: 20px;
            border-bottom: 1px solid #e1e5e8;
        }
        .header h1 {
            margin: 0;
            color: #007bff;
        }
        .content {
            padding: 20px;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            text-decoration: none;
            display: inline-block;
            padding: 12px 20px;
            font-size: 16px;
            color: #ffffff;
            border-radius: 4px;
            text-align: center;
            transition: background-color 0.2s, border-color 0.2s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
        }
        .footer a {
            color: #007bff;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="email-container">
        <div class="header">
            <h1>Bienvenido a nuestra plataforma</h1>
        </div>
        <div class="content">
            <p>Gracias por registrarte. Por favor, verifica tu dirección de correo electrónico haciendo clic en el siguiente enlace:</p>
            <div style="text-align: center; margin: 20px 0;">
                <a href="{{ $verificationLink }}" class="btn-primary">Verificar mi correo electrónico</a>
            </div>
            <p>Si no has creado una cuenta en nuestra plataforma, puedes ignorar este mensaje.</p>
            <p>Saludos,<br>El equipo de Turismo Los Angeles</p>
        </div>
        <div class="footer">
            Este es un correo automático, por favor no respondas a este mensaje.
        </div>
    </div>
</body>
</html>
