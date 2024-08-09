<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Solicitud de Cita</title>
</head>
<body>
    <h1>Nueva Solicitud de Cita</h1>
    <p>Nombre: {{ $details['name'] }}</p>
    <p>Correo Electrónico: {{ $details['email'] }}</p>
    <p>Tipo de Pasaporte: {{ $details['type_visa'] }}</p>
    <p>Fecha: {{ $details['date'] }}</p>
    <p>Personas: {{ $details['adults'] }}</p>
</body>
</html>
