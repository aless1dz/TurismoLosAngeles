<!-- Sección de Mis Citas -->
<h3>Mis Citas</h3>
@if($citas->isEmpty())
    <p>No hay citas programadas.</p>
@else
<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Email</th>
      <th>Tipo</th>
      <th>Fecha</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($citas as $cita)
      <tr>
        <td>{{ $cita->user_name }}</td>
        <td>{{ $cita->user_email }}</td>
        <td>{{ $cita->form_type }}</td>
        <td>{{ $cita->user_date }}</td>
        <td>{{ ucfirst($cita->state_form) }}</td>
        <td>
          <form action="{{ route('cancelar-cita', $cita->idformalities) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas cancelar esta cita?');" class="btn-cancelar">Cancelar</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endif

<!-- Sección de Mis Cotizaciones -->
<h3>Mis Cotizaciones</h3>
@if($cotizaciones->isEmpty())
    <p>No hay cotizaciones registradas.</p>
@else
<table>
  <thead>
    <tr>
      <th>Nombre</th>
      <th>Whatsapp</th>
      <th>Destino</th>
      <th>Fecha</th>
      <th>Pasajeros</th>
      <th>Estado</th>
      <th>Acciones</th>
    </tr>
  </thead>
  <tbody>
    @foreach ($cotizaciones as $cotizacion)
      <tr>
        <td>{{ $cotizacion->user_name }}</td>
        <td>{{ $cotizacion->user_whatsapp }}</td>
        <td>{{ $cotizacion->user_destino }}</td>
        <td>{{ $cotizacion->user_date }}</td>
        <td>{{ $cotizacion->user_pasajeros }}</td>
        <td>{{ ucfirst($cotizacion->state_form) }}</td>
        <td>
          <form action="{{ route('cancelar-cotizacion', $cotizacion->idformalities) }}" method="POST" style="display:inline;">
            @csrf
            @method('DELETE')
            <button type="submit" onclick="return confirm('¿Estás seguro de que deseas cancelar esta cotización?');" class="btn-cancelar">Cancelar</button>
          </form>
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
@endif
