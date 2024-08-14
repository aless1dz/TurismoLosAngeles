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
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e9ecef;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #343a40;
            padding: 20px;
            text-align: center;
        }

        header a {
            color: #ffffff;
            text-decoration: none;
            font-size: 1.5rem;
            font-weight: bold;
        }

        section.contact {
            max-width: 1200px;
            margin: 30px auto;
            padding: 30px;
            background-color: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            color: #007bff;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #dee2e6;
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #007bff;
            color: #ffffff;
            font-weight: bold;
        }

        .btn-cancelar {
            background-color: #28a745; /* Verde */
            color: white;
            border: none;
            padding: 8px 14px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-cancelar:hover {
            background-color: #218838;
            transform: scale(1.05);
        }

        @media (max-width: 768px) {
            table {
                font-size: 14px;
            }

            .btn-cancelar {
                padding: 6px 10px;
            }
        }

        .alert {
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <header>
        <a href="/citasPrincipal"><img src="{{ asset('ImgCitas/IMG-Regresar.png') }}" alt="Logo Company" style="width: 150px;"></a>
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
                    <th>Estado</th>
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
