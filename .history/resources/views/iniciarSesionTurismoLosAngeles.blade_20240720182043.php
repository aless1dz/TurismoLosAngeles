<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/iniciarSesion.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>

    <div class="wrapper">
       <div class="form-box">
            <div class="login-container" id="login">
              <div class="top">
                <span>¿No tienes cuenta? <a href="/registrarse" onclick="register()">registrate</a></span>
                <header>Iniciar sesión</header>
              </div>
              <form action="/inicio-sesion" method="POST">
              @csrf
              <div class="input-box">
                <input type="email" value="{{old('email')}}" name="email" class="input-field" placeholder="Email">
                @error('email')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
                <i class="bx bx-envelope"></i>
              </div>
              <div class="input-box">
                <input type="password" name="password" class="input-field" placeholder="Contraseña">
                @error('password')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
                <i class="bx bx-lock-alt"></i>
              </div>
              <div class="input-box">
                <input type="submit" class="submit" value="Iniciar sesión">
              </div>
              </form>
              <div class="two-col">
                <div class="two">
                    <label><a href="#">¿Olvidaste la contraseña?</a></label>
                  </div>
              </div>
             </div>
       </div>
    </div>
    
</body>
</html>