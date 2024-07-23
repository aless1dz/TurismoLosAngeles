<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/registrarse.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Document</title>
</head>
<body>

    <div class="wrapper">
       <div class="form-box">
             <div class="register-container" id="register">
          <div class="top">
            <span>¿Ya tienes cuenta? <a href="/iniciar-sesion" onclick="login()">Iniciar sesión</a></span>
            <header>Registrate</header>
          </div>
          <form action="/registrar" method="POST">
          @csrf
          <div class="two-forms">
            <div class="input-box">
              <input type="text"value="{{old('name)}}" name="name" class="input-field" placeholder="Nombre">
              <i class="bx bx-user"></i>
              @error('name')
              {{$message}}
              @enderror
            </div>
            <div class="input-box">
              <input type="text" class="input-field" placeholder="Apellido">
              <i class="bx bx-user"></i>
            </div>
          </div>
          <div class="input-box">
            <input type="email" class="input-field" placeholder="Email">
            <i class="bx bx-envelope"></i>
          </div>
          <div class="input-box">
            <input type="password" class="input-field" placeholder="Contraseña">
            <i class="bx bx-lock-alt"></i>
          </div>
          <div class="input-box">
            <input type="submit" class="submit" value="Registrate">
          </div>
          </form>

         </div>
       </div>
      </div>
    
</body>
</html>