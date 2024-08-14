<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperación de Contraseña</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

<style>
    body {
    background-color: #f4f7f6;
    margin: 0;
    padding: 0;
}
.email-container {
    background-color: #ffffff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 600px;
    margin: 40px auto;
}
.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    text-decoration: none;
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    color: #ffffff;
    border-radius: 4px;
    text-align: center;
}
.btn-primary:hover {
    background-color: #0056b3;
    border-color: #004085;
}
.footer {
    font-size: 14px;
    color: #6c757d;
    text-align: center;
    margin-top: 20px;
}
h1 {
    color: #343a40;
    margin-bottom: 20px;
}
p {
    font-size: 16px;
    color: #495057;
}
</style>

</head>
<body>
<div class="container">
        <div class="email-container">
            <h1 class="text-center">Recuperación de Contraseña</h1>
            <p>Hemos recibido una solicitud para recuperar tu contraseña. Para proceder, haz clic en el siguiente enlace:</p>
            <div class="text-center mb-4">
                <a href="{{ route('formulario-actualizar-contrasenia', $token) }}" class="btn btn-primary">Recuperar Contraseña</a>
            </div>
            <p>Si no solicitaste la recuperación de contraseña, por favor ignora este mensaje.</p>
            <p>Gracias,<br>El equipo de Turismo Los Angeles</p>
            <div class="footer">
                Este es un correo automático. Por favor, no respondas a este mensaje.
            </div>
        </div>
    </div>
</body>
</html>
