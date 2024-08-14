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
            @forelse ($appointments as $appointment)
                <tr>
                    <td>{{ $appointment->name }}</td>
                    <td>{{ $appointment->email }}</td>
                    <td>{{ $appointment->visa_type }}</td>
                    <td>{{ $appointment->date }}</td>
                    <td>{{ $appointment->people_count }}</td>
                    <td>
                        <form action="{{ route('cancel.visa', $appointment->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Cancelar Cita</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6">No tienes citas programadas.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
