<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD de Usuarios</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <button class="btn btn-primary" data-toggle="modal" data-target="#userModal">Añadir Usuario</button>
        <table id="userTable" class="table table-striped mt-3">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Rol</th>
                    <th>Fecha de Nacimiento</th>
                    <th>Email</th>
                    <th>Creado</th>
                    <th>Actualizado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <!-- Filas de usuarios se insertarán aquí dinámicamente -->
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
                        <input type="hidden" id="userId" name="id">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" required>
                        </div>
                        <div class="form-group">
                            <label for="last_name">Apellido</label>
                            <input type="text" class="form-control" id="last_name" name="last_name" required>
                        </div>
                        <div class="form-group">
                            <label for="birthdate">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="password">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label for="role">Rol</label>
                            <input type="text" class="form-control" id="role" name="role" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.2/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#userModal').on('show.bs.modal', function (e) {
                $('#userForm')[0].reset();
                $('#userId').val('');
                $('#userModalLabel').text('Añadir Usuario');
            });

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

            $('#userTable').on('click', '.delete-btn', function () {
                let row = $(this).closest('tr');
                let id = row.data('id');
                if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
                    $.ajax({
                        url: `/users/${id}`,
                        method: 'DELETE',
                        success: function (response) {
                            if (response.success) {
                                row.remove();
                            } else {
                                alert('Error: ' + response.error);
                            }
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
                        <td>${user.role}</td>
                        <td>${user.birthdate}</td>
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
