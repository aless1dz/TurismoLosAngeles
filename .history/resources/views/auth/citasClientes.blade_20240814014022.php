<!-- auth/citasClientes.blade.php -->

<h1>Mis Citas</h1>

@if($citas->isEmpty())
    <p>No hay citas programadas.</p>
@else
    <ul>
        @foreach($citas as $cita)
            <li>{{ $cita->user_name }} - {{ $cita->user_date }} - {{ $cita->state_form }}</li>
        @endforeach
    </ul>
@endif

<h1>Mis Cotizaciones</h1>

@if($cotizaciones->isEmpty())
    <p>No hay cotizaciones registradas.</p>
@else
    <ul>
        @foreach($cotizaciones as $cotizacion)
            <li>{{ $cotizacion->user_name }} - {{ $cotizacion->user_date }} - {{ $cotizacion->state_form }}</li>
        @endforeach
    </ul>
@endif
