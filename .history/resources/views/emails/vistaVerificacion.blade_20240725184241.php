<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: #f0f2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }
        .container {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            max-width: 500px;
            width: 100%;
        }
        .header {
            background-color: #4a90e2;
            color: #fff;
            padding: 20px;
            text-align: center;
            font-size: 24px;
        }
        .content {
            padding: 30px;
            text-align: center;
            font-size: 16px;
            line-height: 1.6;
            color: #333;
        }
        .content p {
            margin: 20px 0;
        }
        .btn {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #4a90e2;
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .btn:hover {
            background-color: #357ab8;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="header">Verificación de Correo Electrónico</div>
    <div class="content">
        <p>Se ha enviado un correo de verificación a tu dirección de email.</p>
        <p>Por favor, revisa tu bandeja de entrada y sigue las instrucciones para verificar tu cuenta.</p>
        <p>Si no has recibido el correo, vuelve a intentarlo</p>
        <a href="#" class="btn">Reenviar Correo</a>
    </div>
</div>
</body>
</html>
