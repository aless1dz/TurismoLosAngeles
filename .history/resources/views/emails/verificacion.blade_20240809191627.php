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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin: 0;
            padding: 0;
            color: #333;
        }
        .email-container {
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            padding: 0;
            max-width: 600px;
            margin: 40px auto;
            border: 1px solid #e1e5e8;
            transition: background-color 0.3s, color 0.3s;
        }
        .header {
            text-align: center;
            padding: 20px;
            background-color: #0056b3;
            border-radius: 12px 12px 0 0;
        }
        .header h1 {
            margin: 0;
            color: #ffffff;
            font-size: 24px;
        }
        .content {
            padding: 20px;
            background-color: #ffffff;
        }
        .btn-primary {
            background-color: #0056b3;
            border-color: #0056b3;
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
            background-color: #003d80;
            border-color: #002d5b;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            color: #6c757d;
            margin-top: 20px;
            background-color: #ffffff;
            border-radius: 0 0 12px 12px;
            padding: 20px;
        }
        .footer a {
            color: #0056b3;
            text-decoration: none;
        }
        .footer a:hover {
            text-decoration: underline;
        }
        @media (prefers-color-scheme: dark) {
            body {
                background-color: #121212;
                color: #d1d1d1;
            }
            .email-container {
                background-color: #1e1e1e;
                border: 1px solid #333;
            }
            .header {
                background-color: #69a0ff;
            }
            .header h1 {
                color: #ffffff;
            }
            .content {
                background-color: #1e1e1e;
            }
            .btn-primary {
                background-color: #69a0ff;
                border-color: #69a0ff;
            }
            .btn-primary:hover {
                background-color: #4a81db;
                border-color: #3c6bb3;
            }
            .footer {
                background-color: #1e1e1e;
            }
            .footer a {
                color: #69a0ff;
            }
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
