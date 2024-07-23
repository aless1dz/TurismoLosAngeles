<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/inicioSesion.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>

    <!-- Inicio de Sesión -->
    <div class="form-container sign-in-form">
        <div class="form-box sign-in-box">
            <h2>Inicio de sesión</h2>
            <form action="/login" method="POST">
            @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" name="email" placeholder="Email" required>
                </div>
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input class="password-input" type="password" name="password" placeholder="Contraseña" required>
                    <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                </div>
                <div class="forgot-link">
                    <a href="">Olvidaste tu contraseña?</a>
                </div>
                @if ($errors->has('invalid_credentials'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <small>
                        <strong>{{ $errors->first('invalid_credentials') }}</strong>
                    </small>
                    <button type="button" class="close" data-dismiss="alert" aria-label="close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            @endif
                <input class="submit-btn" type="submit" value="Login">
            </form>
        </div>
        <div class="imgBox sign-in-imgBox">
            <div class="sliding-link">
                <p>No tienes cuenta?</p>
                <span class="sign-up-btn">Registrate</span>
            </div>
            <img src="ImgOf/Mobile-login.jpg" alt="">
        </div>
    </div>

   
    <!-- Final Inicio de Sesión -->

    <script type="text/javascript" src="{{ asset('js/inicioSesion.js')}}"></script>
    
</body>
</html>
