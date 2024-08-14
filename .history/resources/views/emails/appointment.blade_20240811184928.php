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
