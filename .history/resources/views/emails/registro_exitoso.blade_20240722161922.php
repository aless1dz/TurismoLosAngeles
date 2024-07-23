<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            font-family: Arial, sans-serif;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .email-wrapper {
            width: 100%;
            background-color: #f4f4f4;
            padding: 20px;
        }
        .email-content {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 5px;
            overflow: hidden;
        }
        .email-header {
            background-color: #007bff;
            color: #ffffff;
            padding: 20px;
            text-align: center;
        }
        .email-body {
            padding: 20px;
        }
        .email-footer {
            background-color: #f4f4f4;
            text-align: center;
            padding: 10px;
            font-size: 12px;
            color: #888888;
        }
        a {
            color: #007bff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-content">
            <div class="email-header">
                <h1>{{ $detalles['titulo'] }}</h1>
            </div>
            <div class="email-body">
                <p>{{ $detalles['cuerpo'] }}</p>
                <p>Para más detalles, visita <a href="/inicio">nuestro sitio web</a>.</p>
            </div>
            <div class="email-footer">
                <p>Este es un mensaje automático. No respondas a este correo.</p>
            </div>
        </div>
    </div>
</body>
</html>
