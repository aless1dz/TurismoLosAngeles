<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administración</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
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
        .table-responsive {
            background-color: #ffffff;
            border-radius: 5px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
        }
        .table thead th {
            background-color: #34495e;
            color: #ffffff;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }
        .table tbody tr:hover {
            background-color: #eaeaea;
        }
        .table tbody tr td {
            vertical-align: middle;
        }
        .btn {
            background-color: #2255c4;
            border-color: #2255c4;
        }
        .btn:hover {
            background-color: #1f4aaa;
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
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
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
                            <a class="nav-link" href="{{ route('users') }}">
                                <i class="bi bi-people-fill"></i> Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                <i class="bi bi-person-hearts"></i> Acompañantes
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
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('rentas') }}">
                                <i class="bi bi-car-front-fill"></i> Renta de Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('viajes') }}">
                                <i class="bi bi-airplane"></i> Solicitud de Viajes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>

        <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h1 class="h2">Citas Renta de Unidades</h1>
            <a href="{{ route('citas') }}" class="btn btn-primary">Menu</a>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <div class="input-group w-50">
                    <input type="text" id="search-input" class="form-control" placeholder="Buscar por nombre...">
                    <div class="input-group-append">
                        <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
                    </div>
                </div>
                <div class="input-group ml-2">
                    <input type="date" id="start-date" class="form-control" placeholder="Fecha Inicio">
                    <input type="date" id="end-date" class="form-control ml-2" placeholder="Fecha Fin">
                    <button id="filter-date-btn" class="btn btn-secondary ml-2">Filtrar Fecha</button>
                </div>
            </div>
            
            <div class="table-responsive">
                <table class="table table-sm table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Tipo de Unidad</th>
                            <th>Fecha</th>
                            <th>Pasajeros</th>
                            <th>Fecha de Envío</th>
                            <th>Estado</th> <!-- Columna de estado añadida -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($rentas as $renta)
                            <tr>
                                <td>{{ $renta->user_name }}</td>
                                <td>{{ $renta->user_email }}</td>
                                <td>{{ $renta->type_transport }}</td>
                                <td>{{ $renta->user_date }}</td>
                                <td>{{ $renta->user_pasajeros }}</td>
                                <td>{{ $renta->created_at}}</td>
                                <td>{{ ucfirst($renta->state_form) }}</td> <!-- Mostrar el estado -->
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search-input');
    const searchButton = document.getElementById('search-btn');
    const startDateInput = document.getElementById('start-date');
    const endDateInput = document.getElementById('end-date');
    const filterDateButton = document.getElementById('filter-date-btn');
    const table = document.querySelector('table tbody');

    function filterRows() {
        const searchTerm = searchInput.value.toLowerCase();
        const startDate = startDateInput.value;
        const endDate = endDateInput.value;
        const rows = table.querySelectorAll('tr');

        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(1)');
            const dateCell = row.querySelector('td:nth-child(4)');
            const dateText = dateCell.textContent;

            let match = true;

            if (searchTerm && nameCell) {
                const nameText = nameCell.textContent.toLowerCase();
                if (!nameText.includes(searchTerm)) {
                    match = false;
                }
            }

            if (startDate && dateText < startDate) {
                match = false;
            }

            if (endDate && dateText > endDate) {
                match = false;
            }

            row.style.display = match ? '' : 'none';
        });
    }

    searchButton.addEventListener('click', filterRows);
    filterDateButton.addEventListener('click', filterRows);

    searchInput.addEventListener('input', filterRows);
});
</script>
</body>
</html>
