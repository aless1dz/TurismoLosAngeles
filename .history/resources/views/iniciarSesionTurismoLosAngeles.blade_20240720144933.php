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

    
       <div class="form-box">
            <div class="login-container" id="login">
              <div class="top">
                <span>¿No tienes cuenta? <a href="/registrarse" onclick="register()">registrate</a></span>
                <header>Iniciar sesión</header>
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
                <input type="submit" class="submit" value="Iniciar sesión">
              </div>
              <div class="two-col">
                <div class="two">
                    <label><a href="#">¿Olvidaste la contraseña?</a></label>
                  </div>
              </div>
             </div>
       </div>
    
</body>
</html>