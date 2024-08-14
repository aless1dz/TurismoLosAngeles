<!-- resources/views/mis-vistas.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Citas</title>
    <link rel="stylesheet" href="{{ asset('css/citas.css') }}">
</head>
<body>
    <header>
        <a href="/citasPrincipal" class="container__logo"><img src="{{ asset('ImgCitas/IMG-Regresar.png') }}" alt="Logo Company"></a>
    </header>
    <section class="contact">
        <h2>Mis Citas</h2>
        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif
        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Tipo de Visa</th>
                    <th>Fecha</th>
                    <th>Adultos</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                <tr>
                    <td>{{ $cita->user_name }}</td>
                    <td>{{ $cita->user_email }}</td>
                    <td>{{ $cita->type_visa }}</td>
                    <td>{{ $cita->user_date }}</td>
                    <td>{{ $cita->user_adult }}</td>
                    <td>
                        <form action="{{ route('cancelar-cita', $cita->id) }}" method="POST" style="display:inline;">
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
