@component('mail::message')
# Nueva Solicitud de Cotización

Se ha registrado una nueva solicitud de cotización con la siguiente información:

- **Nombre**: {{ $details['user_name'] }}
- **WhatsApp**: {{ $details['user_whatsapp'] }}
- **Destino**: {{ $details['user_destino'] }}
- **Fecha**: {{ $details['user_date'] }}
- **Número de pasajeros**: {{ $details['user_pasajeros'] }}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
