<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administracion</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
   
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
                            <a class="nav-link" href="#">
                                Viajes
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Renta de Unidades
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                VISA
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Clientes
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Acompañantes
                            </a>
                        </li>
                    </ul>
                </div>
            </nav>
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <h1 class="h2">Clientes</h1>
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#associateModal" onclick="clearForm()">
                    Añadir Cliente
                </button>
                <input type="text" id="search-input" class="form-control mr-2" placeholder="Buscar por nombre...">
                <button id="search-btn" class="btn btn-secondary">Buscar <i class="bi bi-search"></i></button>
            </div>
            
            <table class="table table-sm table-bordered">
                <thead class="table-dark">
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Apellidos</th>
                        <th>Fecha Nacimiento</th>
                        <th>Editar/Eliminar</th>
                    </tr>
                </thead>
                <tbody id="associateTableBody">
                    
                </tbody>
            
            </table>
        </div>
  </div>
  <div class="modal fade" id="associateModal" tabindex="-1" aria-labelledby="associateModalLabel" aria-hidden="true">
  <div class="modal-dialog">
      <div class="modal-content">
          <form id="associateForm">
              @csrf
              <div class="modal-header">
                  <h5 class="modal-title" id="associateModalLabel">Añadir/Editar Cliente</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                  </button>
              </div>
              <div class="modal-body">
                  <input type="hidden" id="associates_id" name="id">
                  <div class="form-group">
                      <label for="nombre">Nombre</label>
                      <input type="text" class="form-control" id="nombre" name="nombre" required>
                  </div>
                  <div class="form-group">
                          <label for="titulo">Apellidos</label>
                          <input type="text" class="form-control" id="last_name" name="last_name" required>
                      </div>
                  <div class="form-group">
                          <label for="lanzamiento">Fecha Nacimiento</label>
                          <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                      </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                  <button type="submit" class="btn btn-primary">Guardar Cambios</button>
              </div>
          </form>
      </div>
  </div>
  </div>
</body>
</html>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
var associates = [];

$(document).ready(function () {
    fetchAssociates();
    fetchDesarrolladores();
    fetchCategorias();

    $('#sort-asc').on('click', function () {
        fetchAssociates('id', 'asc');
    });
    $('#sort-desc').on('click', function () {
        fetchAssociates('id', 'desc');
    });

    $('#associateForm').on('submit', function (e) {
        e.preventDefault();

        let id = $('#associates_id').val();
        let url = id ? `/update/associate/${id}` : '/insert/associate';
        let method = id ? 'PUT' : 'POST';

        $.ajax({
            url: url,
            method: method,
            data: $('#associateForm').serialize(),
            success: function (response) {
                $('#associateModal').modal('hide');
                fetchAssociates();
            },
            error: function (error) {
                console.log(error);
            }
        });
    });

    $('#search-btn').on('click', function () {
        applyFilters();
    });
});

function fetchAssociates() {
    $.get(`/get/associates?order=${order}`, function (data) {
        associates = data;
        renderAssociates(associates);
    });
}

function renderAssociates(data) {
    let tableBody = $('#associateTableBody');
    tableBody.empty();
    data.forEach(associate => {
        tableBody.append(`
            <tr>
                <td>${associate.id}</td>
                <td>${associate.name}</td>
                <td>${associate.last_name}</td>
                <td>${associate.birthdate}</td>
                <td>
                    <button class="btn btn-warning" onclick="editVideojuego(${associate.id})"><i class="bi bi-pencil-fill"></i></button>
                    <button class="btn btn-danger" onclick="deleteVideojuego(${associate.id})"><i class="bi bi-backspace-fill"></i></button>
                </td>
            </tr>
        `);
    });
}

function applyFilters() {
    let searchValue = $('#search-input').val().toLowerCase();
    let startDate = $('#start-date').val();
    let endDate = $('#end-date').val();
    
    let filteredAssociates = Associates.filter(function (associate) {
        let match = true;

        if (searchValue) {
            match = associate.name.toLowerCase().includes(searchValue);
        }

        if (startDate) {
            match = match && (associate.birthdate >= startDate);
        }

        if (endDate) {
            match = match && (associate.birthdate <= endDate);
        }

        return match;
    });

    renderAssociates(filteredAssociates);
}



function editAssociate(id) {
    $.get(`/get/associate/${id}`, function (associate) {
        $('#associates_id').val(associate.id);
        $('#name').val(associate.name);
        $('#birthdate').val(associate.birthdate);
        $('#associateModal').modal('show');
    });
}

function deleteVideojuego(id) {
    $.ajax({
        url: `/delete/associate/${id}`,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        method: 'DELETE',
        success: function () {
            fetchAssociates();
        },
        error: function (error) {
            console.log(error);
        }
    });
}

function clearForm() {
    $('#associates_id').val('');
    $('#associateForm')[0].reset();
}
</script>
</body>
</html>