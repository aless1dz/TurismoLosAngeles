<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Citas comentarios | Administración</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">Dashboard</a>
    <div class="collapse navbar-collapse">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown">
                    <i class="fas fa-user"></i> User
                </a>
            </li>
        </ul>
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky">
            <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link active" href="#">
                                Dashboard
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('trips') }}">
                                Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                Citas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('users') }}">
                                Clientes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('associates') }}">
                                Acompañantes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('units') }}">
                                Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('cities') }}">
                                Ciudades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('states') }}">
                                Estados
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('destinations') }}">
                                Destinos
                            </a>
                        </li>
                            
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('cost_tabulators') }}">
                                Tabla de Costos
                            </a>
                        </li>
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('pasaportes') }}">
                                Citas Pasaportes
                            </a>
                        </li>
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('cotizaciones') }}">
                                Citas Cotizaciones
                            </a>
                        </li>
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('comentarios') }}">
                                Comentarios
                            </a>
                        </li>
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('rentas') }}">
                                Renta de Unidades
                            </a>
                        </li>
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('viajes') }}">
                                Solicitud de Viajes
                            </a>
                        </li>
                        <li class="nav_item">
                            <a class="nav_link" href="{{ route('visas') }}">
                                Citas para Visas
                            </a>
                        </li>
                    </ul>
            </div>
        </nav>

        <div class="col-md-10 ml-sm-auto col-lg-10 px-4">
            <h1 class="h2">Comentarios</h1>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
            </div>
            <table class="table table-sm table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Email/Correo</th>
                        <th>Comentario</th>
                        <th>Fecha de Envío</th>
                        
                        
                    </tr>
                </thead>
                <tbody>
                    @foreach($comentarios as $comentario)
                        <tr>
                            <td>{{ $comentario->user_name }}</td>
                            <td>{{ $comentario->user_email }}</td>
                            <td>{{ $comentario->message }}</td>
                            <td>{{ $comentario->created_at}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
    const table = document.querySelector('table tbody');

    searchButton.addEventListener('click', function() {
        const searchTerm = searchInput.value.toLowerCase();
        const rows = table.querySelectorAll('tr');

        rows.forEach(row => {
            const nameCell = row.querySelector('td:nth-child(1)'); 
            if (nameCell) {
                const nameText = nameCell.textContent.toLowerCase();
                if (nameText.includes(searchTerm)) {
                    row.style.display = ''; 
                } else {
                    row.style.display = 'none'; 
                }
            }
        });
    });

    searchInput.addEventListener('input', function() {
        searchButton.click();
    });
});
</script>
</body>
</html>
