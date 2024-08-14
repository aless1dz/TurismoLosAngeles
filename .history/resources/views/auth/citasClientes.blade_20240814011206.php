@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Mis Citas</h2>
    @if ($citas->isEmpty())
        <p>No tienes citas programadas.</p>
    @else
        <ul>
            @foreach ($citas as $cita)
                <li>{{ $cita->user_name }} - {{ $cita->user_date }} - Estado: {{ $cita->state_form }}</li>
            @endforeach
        </ul>
    @endif

    <h2>Mis Cotizaciones</h2>
    @if ($cotizaciones->isEmpty())
        <p>No tienes cotizaciones.</p>
    @else
        <ul>
            @foreach ($cotizaciones as $cotizacion)
                <li>{{ $cotizacion->user_name }} - {{ $cotizacion->user_date }} - Estado: {{ $cotizacion->state_form }}</li>
            @endforeach
        </ul>
    @endif
</div>
@endsection
