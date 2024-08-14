<!-- resources/views/emails/appointment.blade.php -->
<p>Hola,</p>
<p>Se ha recibido una nueva solicitud con los siguientes detalles:</p>

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

@if(isset($details['user_pasajeros']))
    <p><strong>Pasajeros:</strong> {{ $details['user_pasajeros'] }}</p>
@endif

@if(isset($details['message']))
    <p><strong>Mensaje:</strong> {{ $details['message'] }}</p>
@endif

<p>Saludos,</p>
<p>Tu equipo</p>
