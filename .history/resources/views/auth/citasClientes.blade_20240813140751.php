<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Mis Citas</title>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

  <style>
    body {
  font-family: Arial, sans-serif;
  margin: 0;
  padding: 0;
  background-color: #f0f0f0; /* Light background for better contrast */
}

.header {
  display: flex;
  justify-content: space-between;
  align-items: center;
  padding: 1rem 2rem;
  background-color: #395DFF; /* Consistent header color */
  color: #fff; /* White text for header */
}

.logo {
  size:10px;
}

h2 {
  font-size: 1.5rem;
  margin: 0;
}

.appointments {
  margin: 2rem auto;
  width: 80%; /* Adjust width for responsiveness */
  padding: 1rem 2rem;
  border-radius: 5px;
  background-color: #fff; /* White background for table */
  box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1); /* Subtle shadow for depth */
}

table {
  width: 100%;
  border-collapse: collapse;
}

th, td {
  border: 1px solid #ddd;
  padding: 10px;
  text-align: left; /* Left-align content for readability */
}

th {
  background-color: #395DFF;
  color: #fff;
}

.btn-cancelar {
  background-color: #007bff; /* Blue cancel button */
  color: #fff;
  border: none;
  padding: 5px 10px; /* Adjust padding for better fit */
  border-radius: 3px;
  cursor: pointer;
  transition: background-color 0.3s ease;
}

.btn-cancelar:hover {
  </style>
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
