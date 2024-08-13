<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 100%;
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #0044cc;
            color: #ffffff;
            padding: 10px 20px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
        .content {
            padding: 20px;
            color: #333333;
        }
        .content p {
            margin: 0 0 10px;
        }
        .content p strong {
            color: #0044cc;
        }
        .footer {
            text-align: center;
            padding: 10px;
            color: #777777;
            font-size: 14px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Notificación de Solicitud</h1>
        </div>
        <div class="content">
            <p>Hola,</p>
            <p>Se ha recibido una nueva solicitud con los siguientes detalles:</p>

            @if(isset($details['form_type']))
                <p><strong>Tipo:</strong> {{ $details['form_type'] }}</p>
            @endif

            @if(isset($details['user_name']))
                <p><strong>Nombre:</strong> {{ $details['user_name'] }}</p>
            @endif

            @if(isset($details['user_whatsapp']))
                <p><strong>WhatsApp:</strong> {{ $details['user_whatsapp'] }}</p>
            @endif

            @if(isset($details['user_destino']))
                <p><strong>Destino:</strong> {{ $details['user_destino'] }}</p>
            @endif

            @if(isset($details['user_date']))
                <p><strong>Fecha:</strong> {{ $details['user_date'] }}</p>
            @endif

            @if(isset($details['user_adult']))
                <p><strong>Adultos:</strong> {{ $details['user_adult'] }}</p>
            @endif

            @if(isset($details['user_email']))
                <p><strong>Correo:</strong> {{ $details['user_email'] }}</p>
            @endif

            @if(isset($details['type_visa']))
                <p><strong>Tipo de visa:</strong> {{ $details['type_visa'] }}</p>
            @endif

            @if(isset($details['type_transport']))
                <p><strong>Tipo de transporte:</strong> {{ $details['type_transport'] }}</p>
            @endif

            @if(isset($details['user_pasajeros']))
                <p><strong>Pasajeros:</strong> {{ $details['user_pasajeros'] }}</p>
            @endif

            @if(isset($details['user_kid']))
                <p><strong>Niños:</strong> {{ $details['user_kid'] }}</p>
            @endif

            @if(isset($details['message']))
                <p><strong>Mensaje:</strong> {{ $details['message'] }}</p>
            @endif

            <p>Saludos,</p>
            <p>Tu equipo</p>
        </div>
        <div class="footer">
            © {{ date('Y') }} Turismo Los Angeles. Todos los derechos reservados.
        </div>
    </div>
</body>
</html>