@component('mail::message')
# ¡Bienvenido, {{ $user->name }}!

Gracias por registrarte en nuestra aplicación. Estamos emocionados de tenerte con nosotros.

Si tienes alguna pregunta, no dudes en contactarnos.

@component('mail::button', ['url' => url('/home')])
Ir a mi cuenta
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
