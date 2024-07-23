<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('css/inicioSesion.css') }}">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.8/css/line.css">
</head>
<body>

    <!-- Inicio de Sesión -->
    <div class="form-container sign-in-form">
        <div class="form-box sign-in-box">
            <h2>Inicio de sesión</h2>
            <form action="/logear-turismo-los-angeles" method="POST">
            @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" name="email" placeholder="Email" >
                </div>
                @error('email')
                   <small class="text-danger mt-1 d-block">
                    <strong>{{$message}}</strong>
                   </small>
                   @enderror
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input class="password-input" type="password" name="password" placeholder="Contraseña" >
                    <div class="eye-btn"><i class="uil uil-eye-slash"></i></div>
                </div>
                @error('password')
                   <small class="text-danger mt-1 d-block">
                    <strong>{{$message}}</strong>
                   </small>
                   @enderror
                <div class="forgot-link">
                    <a href="">Olvidaste tu contraseña?</a>
                </div>
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

    <div class="form-container sign-up-form">
        <div class="imgBox sign-up-imgBox">
            <div class="sliding-link">
                <p>Ya eres miembro?</p>
                <span class="sign-in-btn">Iniciar sesión</span>
            </div>
            <img src="ImgOf/10973590.jpg" alt="">
        </div>
        <div class="form-box sign-up-box">
            <h2>Registrate</h2>
            <form action="/registrar-turismo-los-angeles" method="POST">
            @csrf
                <div class="field">
                    <i class="uil uil-at"></i>
                    <input type="email" value="{{old('email')}}" name ="email" placeholder="Email" >
                    
                </div>
                @error('email')
                   <small class="text-danger mt-1 d-block">
                    <strong>{{$message}}</strong>
                   </small>
                   @enderror
                <div class="field">
                    <i class="uil uil-user"></i>
                    <input type="text" value="{{old('name')}}" name="name" placeholder="Nombre completo" >
                    
                </div>
                @error('name')
                   <small class="text-danger mt-1">
                    <strong>{{$message}}</strong>
                   </small>
                   @enderror
                <div class="field">
                    <i class="uil uil-lock-alt"></i>
                    <input type="password" name="password" placeholder="Contraseña" >
                    
                </div>
                @error('password')
                   <small class="text-danger mt-1">
                    <strong>{{$message}}</strong>
                   </small>
                   @enderror
                <div class="field">
                    <i class="uil uil-lock-access"></i>
                    <input type="password" name="password_confirmation" placeholder="Confirmar contraseña" >
                    
                </div>
                @error('password_confirmation')
                   <small class="text-danger mt-1">
                    <strong>{{$message}}</strong>
                   </small>
                   @enderror
                <input class="submit-btn" type="submit" value="Sign up">
            </form>
        </div>
    </div>
    <!-- Final Inicio de Sesión -->

    <script type="text/javascript" src="{{ asset('js/inicioSesion.js')}}"></script>
    
</body>
</html>
