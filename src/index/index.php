<?php
//si el usuario se deslogó, borramos cookie
if (isset($_REQUEST['logout'])) {
  unset($_COOKIE['id_User']);
  setcookie('id_User', null, -1, '/');
}
//si viene de register.php introducimos usuario en bbdd
elseif (isset($_POST['register'])) {
  $user = $_POST['user'];
  $passw = $_POST['password'];
  $fecha = $_POST['fecha'];
  $etiquetas = $_POST['etiquetas'];
  include("db.php");
  $consulta = "INSERT INTO users (username, contra,fecha,etiquetas) VALUES ('$user','$passw','$fecha','$etiquetas')";
  mysqli_query($conexion, $consulta);
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Bienvenid@ a Jamboree</title>
  <!-- LESS -->
  <link rel="stylesheet/less" href="index.less">
  <script src="../less.min.js" type="text/javascript"></script>
  <!--FONT AWESOME-->
  <script src="https://kit.fontawesome.com/e36b117475.js" crossorigin="anonymous"></script>

  <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha384-tsQFqpEReu7ZLhBV2VZlAu7zcOV+rXbYlF2cqB8txI/8aZajjp4Bqd+V6D5IgvKT" crossorigin="anonymous">
  </script>
  <script src="carousel.js"></script>

</head>

<body>




  <!--HEADER -->
  <header>
    <div class="logo">LOGO</div>
    <div class="title">
      Jamboree
    </div>

    <div class="social">

      <a><i class="fab fa-twitter"></i></a>
      <a><i class="fab fa-facebook"></i></a>
      <a><i class="fab fa-instagram"></i></a>

    </div>

  </header>

  <!--MAIN-->
  <main>
    <div class="text">The fastest way from your brain to your speakers</div>
    <div class="maindiv">
      <div class="video">

        <video  muted loop autoplay>

          <source src="1.mp4" type="video/mp4">
        </video>
        <div class="div-textvideo">
          <div class="textvideo">
            <!--<h1>Foro</h1>
            <p>Descubre las canciones
                    <br>mas originales-->
            </p>
          </div>
          <div class="textvideo">
            <!--<h1>Audioteca</h1>
            <p>Guarda tus canciones
              <br>para seguirlas-->
            </p>
          </div>
          <div class="textvideo">
            <!--<h1>Estudio</h1>
            <p>Deja fluir tu <br>creatividad</p>-->
          </div>
          
        </div>
      </div>
      <div class="card-carousel">
        <div class="my-card"></div>
        <div class="my-card"></div>
        <div class="my-card"></div>
        <div class="my-card"></div>
        <div class="my-card"></div>
      </div>
    </div>
    <div class="log">
      <input type="checkbox" name="" id="show">
      <input type="checkbox" name="" id="reg">
      <label for="show" class="open-btn">Entrar</label>

      <div class="Loginform">
        <label for="show" class="close-btn fas fa-times"></label>Login Form</br>
        </br>
        <form action="validar.php" method="post">

          <div class="data">
            <p>Username</p>
            <input type="text" name="username" id="">
          </div>
          <div class="data">
            <p><br>Password</p>
            <input type="password" name="password" id="">
          </div>

          <div class="btn">
            <button type="submit" name='log'><i class="fas fa-play"></i></button>
          </div>

          <div class="LinkRegister"><br><a href="register.php">No estas registrado?Registrate</a></div>
        </form>
      </div>
      <!-- HACER popup para formulario de inicio o registro -->

    </div>


  </main>
  <!--FOOTER-->
  <footer>
    <div class="contactos">Nuestros nombres</div>
    <div class="lopd">ley organica proteccion datos, cookies...</div>
    <div class="year">AÑO y Copyright</div>
  </footer>
</body>

</html>