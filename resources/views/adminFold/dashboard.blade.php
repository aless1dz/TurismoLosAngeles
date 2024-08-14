<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="icon" type="image/x-icon" href="{{ asset('imagenesInicio/favicon.ico') }}">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f7f7f7;
        }
        .navbar {
            background-color: #35424a;
        }
        .navbar-brand, .navbar-nav .nav-link {
            color: #ffffff !important;
        }
        .sidebar {
            background-color: #2c3e50;
            color: #ffffff;
            min-height: 100vh;
            padding-top: 1rem;
        }
        .sidebar .nav-link {
            color: #bdc3c7;
            display: flex;
            align-items: center;
            margin-bottom: 1rem;
            padding: 0.5rem;
            border-radius: 0.25rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active {
            background-color: #2255c4;
            color: #ffffff;
        }
        .sidebar .nav-link i {
            margin-right: 0.5rem;
        }
        .btn {
    background-color: #2255c4;
    border-color: #2255c4;
}
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <a class="navbar-brand" href="#">Dashboard</a>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        <button type="button" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
            Cerrar sesión
        </button>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link">
                        <i class="bi bi-person-circle"></i> {{ Auth::user()->name }}
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row">
        <nav class="col-md-2 d-none d-md-block sidebar">
                <div class="sidebar-sticky">
                <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="/dashboard">
                                <i class="bi bi-speedometer2"></i> Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trips') }}">
                                <i class="bi bi-geo-alt"></i> Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('citas') }}">
                                <i class="bi bi-calendar3"></i> Citas
                            </a>
                        </li>
			<li class="nav-item">
                            <a class="nav-link" href="{{ route('users.index') }}">
                                <i class="bi bi-people"></i> Gestionar Usuarios
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                                <i class="bi bi-people-fill"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('units') }}">
                                <i class="bi bi-bus-front-fill"></i> Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('destinations') }}">
                                <i class="bi bi-map"></i> Destinos
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cost_tabulators') }}">
                                <i class="bi bi-currency-dollar"></i> Tabla de Costos
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </div>
</body>
</html>
