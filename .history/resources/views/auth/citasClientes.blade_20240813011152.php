<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Citas</title>
</head>
<body>
    <h1>Mis Citas</h1>
    @if(session('success'))
        <p>{{ session('success') }}</p>
    @elseif(session('error'))
        <p>{{ session('error') }}</p>
    @endif

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Correo</th>
                <th>Tipo de Visa</th>
                <th>Fecha</th>
                <th>Personas</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($appointments as $appointment)
    <tr>
        <td>{{ $appointment->user_name }}</td>
        <td>{{ $appointment->user_email }}</td>
        <td>{{ $appointment->type_visa }}</td>
        <td>{{ $appointment->user_date }}</td>
        <td>{{ $appointment->user_adult }}</td>
        <td>
        <form action="{{ route('cancel.visa', ['id' => $appointment->id]) }}" method="POST">
                @csrf
                @method('DELETE')
                <!-- Imprime el ID para verificar -->
                <input type="hidden" name="appointment_id" value="{{ $appointment->id }}">
                <button type="submit" class="btn btn-danger">Cancelar Cita</button>
            </form>
        </td>
    </tr>
@endforeach
        </tbody>
    </table>
</body>
</html>
