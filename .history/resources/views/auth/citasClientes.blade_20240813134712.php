<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Citas</title>
  <link rel="stylesheet" href="{{ asset('css/citas.css') }}">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">
</head>
<body>
  <header class="header">
    <a href="/citasPrincipal" class="logo"><img src="{{ asset('ImgCitas/IMG-Regresar.png') }}" alt="Logo Company"></a>
    <h2>Mis Citas</h2>
  </header>
  <section class="appointments">
    @if (session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
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
  </section>
</body>
</html>
