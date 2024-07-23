@component('mail::message')
# {{ $detalles['titulo'] }}

{{ $detalles['cuerpo'] }}

Gracias,<br>
{{ config('app.name') }}
@endcomponent
