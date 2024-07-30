<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Recuperar Contraseña</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        /* General Styles */
body {
    background-color: #f8f9fa;
    font-family: 'Arial', sans-serif;
}

.login-form {
    padding: 2rem;
}

.container {
    max-width: 600px;
    margin: 0 auto;
    padding: 1rem;
}

.card {
    border: 1px solid #e3e3e3;
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    overflow: hidden;
}

.card-header {
    background-color: #007bff;
    color: white;
    padding: 1rem;
    font-size: 1.25rem;
    text-align: center;
}

.card-body {
    padding: 2rem;
}

.alert {
    margin-top: 1rem;
}

.form-group {
    margin-bottom: 1.5rem;
}

.col-form-label {
    font-weight: bold;
    font-size: 1rem;
}

.form-control {
    border: 1px solid #ced4da;
    border-radius: 5px;
    padding: 0.75rem;
    font-size: 1rem;
    width: 100%;
}

.text-danger {
    color: #dc3545;
    font-size: 0.875rem;
}

.btn-primary {
    background-color: #007bff;
    border-color: #007bff;
    color: white;
    padding: 0.75rem 1.25rem;
    font-size: 1rem;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

.btn-primary:hover {
    background-color: #0056b3;
}

.offset-md-4 {
    margin-left: 33.333333%;
}


    </style>
</head>
<body>
    <main class="login-form">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">Recuperar Contraseña</div>
                        <div class="card-body">

                            @if (Session::has('message'))
                                <div class="alert alert-success" role="alert">
                                    {{ Session::get('message') }}
                                </div>
                            @endif

                            <form action="{{ route('enviar-recuperacion') }}" method="POST">
                                @csrf
                                <div class="form-group row">
                                    <label for="email_address" class="col-md-4 col-form-label text-md-right">Tu Email</label>
                                    <div class="col-md-6">
                                        <input type="email" id="email_address" class="form-control" name="email"
                                            required autofocus>
                                        @if ($errors->has('email'))
                                            <span class="text-danger">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        Enviar Email de recuperación
                                    </button>
                                </div>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
