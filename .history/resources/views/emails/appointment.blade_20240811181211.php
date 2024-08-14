<!-- resources/views/emails/appointment.blade.php -->
<p>Hola,</p>
<p>Se ha recibido una nueva solicitud de cotización con los siguientes detalles:</p>
<p><strong>Nombre:</strong> {{ $details['user_name'] }}</p>
<p><strong>WhatsApp:</strong> {{ $details['user_whatsapp'] }}</p>
<p><strong>Destino:</strong> {{ $details['user_destino'] }}</p>
<p><strong>Fecha:</strong> {{ $details['user_date'] }}</p>
<p><strong>Pasajeros:</strong> {{ $details['user_pasajeros'] }}</p>
<p>Saludos,</p>
<p>Tu equipo de Cotizaciones</p>
