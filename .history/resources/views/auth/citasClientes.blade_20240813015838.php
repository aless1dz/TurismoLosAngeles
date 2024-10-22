<!-- resources/views/mis-vistas.blade.php -->
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Citas</title>
    <link rel="stylesheet" href="{{ asset('css/citas.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

    <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

    <style>
table {
    width: 100%;
    border-collapse: collapse;
}

th, td {
    border: 1px solid #ddd;
    padding: 8px;
}

th {
    background-color: #f2f2f2;
}

.btn-cancelar {
    background-color: #f44336;
    color: white;
    border: none;
    padding: 5px 10px;
    cursor: pointer;
}

.btn-cancelar:hover {
    background-color: #d32f2f;
}

    </style>
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
                    <th>Tipo</th>
                    <th>Fecha</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach($citas as $cita)
                <tr>
                    <td>{{ $cita->user_name }}</td>
                    <td>{{ $cita->user_email }}</td>
                    <td>{{ $cita->form_type }}</td>
                    <td>{{ $cita->user_date }}</td>
                    <td>{{ $cita->user_adult }}</td>
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
