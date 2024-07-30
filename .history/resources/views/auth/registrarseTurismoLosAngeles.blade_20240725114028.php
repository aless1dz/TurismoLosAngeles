<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/registrarse.css') }}">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <title>Registro</title>
</head>
<body>

    <div class="wrapper">
       <div class="form-box">
             <div class="register-container" id="register">
          <div class="top">
            <span>¿Ya tienes cuenta? <a href="/iniciar-sesion" onclick="login()">Iniciar sesión</a></span>
            <header>Registrate</header>
          </div>
          <form action="/registro " method="POST">
          @csrf
          <div class="two-forms">
            <div class="input-box">
              <input type="text" value="{{old('name')}}" name="name" class="input-field" placeholder="Nombre">
              <i class="bx bx-user"></i>
              @error('name')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
            </div>
            <div class="input-box">
              <input type="text" value="{{old('last_name')}}" name="last_name" class="input-field" placeholder="Apellido">
              <i class="bx bx-user"></i>
              @error('last_name')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
            </div>
          </div>
          <div class="input-box">
            <label for="birthdate">Fecha de Nacimiento</label>
            <input type="date" value="{{old('birthdate')}}" name="birthdate" class="input-field" placeholder="Fecha Nacimiento">
            <i class="bx bx-envelope"></i>
            @error('date')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
          </div>
          <div class="input-box">
            <input type="email" value="{{old('email')}}" name="email" class="input-field" placeholder="Email">
            <i class="bx bx-envelope"></i>
            @error('email')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
          </div>
          <div class="input-box">
            <input type="password" name="password" class="input-field" placeholder="Contraseña">
            <i class="bx bx-lock-alt"></i>
            @error('password')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
          </div>
          <div class="input-box">
            <input type="password" name="password_confirmation" class="input-field" placeholder="Confirmar Contraseña">
            <i class="bx bx-lock-alt"></i>
            @error('password_confirmation')
              <small class="text-danger mt-1">
                <strong>{{$message}}</strong>
              </small>
              @enderror
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