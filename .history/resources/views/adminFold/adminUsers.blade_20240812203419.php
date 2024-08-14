<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestión de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>


<div class="container mt-4">
    <h1>Gestión de Usuarios</h1>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#userModal">Añadir Usuario</button>

    <table class="table" id="userTable">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Rol</th>
                <th>Fecha nacimiento</th>
                <th>Correo Electrónico</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
                <tr data-id="{{ $user->id }}">
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->last_name }}</td>
                    <td>{{ $user->role }}</td>
                    <td>{{ $user->birthdate }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at }}</td>
                    <td>{{ $user->updated_at }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn">Editar</button>
                        <button class="btn btn-danger btn-sm delete-btn">Eliminar</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- Modal -->
<div class="modal fade" id="userModal" tabindex="-1" role="dialog" aria-labelledby="userModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="userModalLabel">Añadir Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="userForm">
                    @csrf
                    <input type="hidden" id="userId">
                    <div class="form-group">
                        <label for="name">Nombre:</label>
                        <input type="text" class="form-control" id="name" name="name" required>
                    </div>
                    <div class="form-group">
                        <label for="last_name">Apellido:</label>
                        <input type="text" class="form-control" id="last_name" name="last_name" required>
                    </div>
                    <div class="form-group">
                        <label for="birthdate">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Rol:</label>
                        <select class="form-control" id="role" name="role" required>
                            <option value="admin">Admin</option>
                            <option value="user">User</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="password">Contraseña:</label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="form-text text-muted">Deja en blanco si no deseas cambiar la contraseña.</small>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {
        // Open modal for adding user
        $('#userModal').on('show.bs.modal', function (e) {
            $('#userForm')[0].reset();
            $('#userId').val('');
            $('#userModalLabel').text('Añadir Usuario');
        });

        // Save user (add/edit)
        $('#userForm').on('submit', function (e) {
            e.preventDefault();
            let id = $('#userId').val();
            let url = id ? `/users/${id}` : '/users';
            let method = id ? 'PUT' : 'POST';
            let formData = $(this).serialize();

            $.ajax({
                url: url,
                method: method,
                data: formData,
                success: function (response) {
                    let row = $(`tr[data-id="${response.id}"]`);
                    if (row.length) {
                        row.replaceWith(createRow(response));
                    } else {
                        $('#userTable tbody').append(createRow(response));
                    }
                    $('#userModal').modal('hide');
                },
                error: function (xhr) {
                    alert('Error: ' + xhr.responseText);
                }
            });
        });

        // Open modal for editing user
        $('#userTable').on('click', '.edit-btn', function () {
            let row = $(this).closest('tr');
            let id = row.data('id');
            $.get(`/users/${id}`, function (user) {
                $('#userId').val(user.id);
                $('#name').val(user.name);
                $('#last_name').val(user.last_name);
                $('#birthdate').val(user.birthdate);
                $('#email').val(user.email);
                $('#role').val(user.role);
                $('#userModalLabel').text('Editar Usuario');
                $('#userModal').modal('show');
            });
        });

        // Delete user
        $('#userTable').on('click', '.delete-btn', function () {
            let row = $(this).closest('tr');
            let id = row.data('id');
            if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                $.ajax({
                    url: `/users/${id}`,
                    method: 'DELETE',
                    success: function () {
                        row.remove();
                    },
                    error: function (xhr) {
                        alert('Error: ' + xhr.responseText);
                    }
                });
            }
        });

        function createRow(user) {
            return `
                <tr data-id="${user.id}">
                    <td>${user.name}</td>
                    <td>${user.last_name}</td>
                    <td>${user.birthdate}</td>
                    <td>${user.role}</td>
                    <td>${user.email}</td>
                    <td>${user.created_at}</td>
                    <td>${user.updated_at}</td>
                    <td>
                        <button class="btn btn-warning btn-sm edit-btn">Editar</button>
                        <button class="btn btn-danger btn-sm delete-btn">Eliminar</button>
                    </td>
                </tr>
            `;
        }
    });
</script>
</body>
</html>
