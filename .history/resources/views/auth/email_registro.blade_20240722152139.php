@component('mail::message')
# ¡Bienvenido, {{ $detalles['nombre'] }}!

Gracias por registrarte en nuestra aplicación. Estamos emocionados de tenerte con nosotros.

@component('mail::button', ['url' => url('/home')])
Ir a mi cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
