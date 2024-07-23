@component('mail::message')
# ¡Bienvenido, {{ $detalles['name'] }}!

Gracias por registrarte en nuestra aplicación. Estamos emocionados de tenerte con nosotros.

@component('mail::button', ['url' => url('/iniciar-sesion')])
Ir a mi cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
