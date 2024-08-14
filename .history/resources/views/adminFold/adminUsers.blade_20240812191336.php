<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Users</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
<div class="container mt-5">
    <h2>Usuarios</h2>
    <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#userModal">Agregar Usuario</button>
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Rol</th>
                <th>Email</th>
                <th>Fecha de Creación</th>
                <th>Fecha de Actualización</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody id="userTableBody">
            @foreach ($users as $user)
            <tr data-id="{{ $user->id }}">
                <td>{{ $user->name }}</td>
                <td>{{ $user->role }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->created_at->format('d/m/Y H:i') }}</td>
                <td>{{ $user->updated_at->format('d/m/Y H:i') }}</td>
                <td>
                    <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#userModal" onclick="editUser({{ $user->id }})">
                        <i class="fas fa-pencil-alt"></i>
                    </button>
                    <button type="button" class="btn btn-danger" onclick="deleteUser({{ $user->id }})">
                        <i class="fas fa-trash"></i>
                    </button>
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
                <h5 class="modal-title" id="userModalLabel">Agregar Usuario</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="userForm">
                <div class="modal-body">
                    <input type="hidden" id="user-id">
                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" required>
                    </div>
                    <div class="form-group">
                        <label for="role">Rol</label>
                        <input type="text" class="form-control" id="role" required>
                    </div>
                    <div class="form-group" id="passwordGroup">
                        <label for="password">Contraseña</label>
                        <input type="password" class="form-control" id="password" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>
    function editUser(userId) {
        $.ajax({
            url: `/admin/users/${userId}`,
            method: 'GET',
            success: function(data) {
                $('#user-id').val(data.id);
                $('#name').val(data.name);
                $('#email').val(data.email);
                $('#role').val(data.role);
                $('#passwordGroup').hide(); // No mostrar contraseña al editar
                $('#userModalLabel').text('Editar Usuario');
                $('#userForm').attr('data-method', 'PUT');
            }
        });
    }

    function deleteUser(userId) {
        if (confirm('¿Estás seguro de que deseas eliminar este usuario?')) {
            $.ajax({
                url: `/admin/users/${userId}`,
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function() {
                    $(`#userTableBody tr[data-id="${userId}"]`).remove();
                }
            });
        }
    }

    $('#userForm').on('submit', function(event) {
        event.preventDefault();
        const userId = $('#user-id').val();
        const method = $(this).attr('data-method') || 'POST';
        const url = userId ? `/admin/users/${userId}` : '/admin/users';

        $.ajax({
            url: url,
            method: method,
            data: $(this).serialize(),
            success: function(response) {
                $('#userModal').modal('hide');
                location.reload(); // Recarga la página para mostrar los datos actualizados
            }
        });
    });
</script>
</body>
</html>
