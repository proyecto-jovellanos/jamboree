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
  include("db.php");
  $consulta = "INSERT INTO users (username,contra,fecha) VALUES ('$user','$passw','$fecha')";
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
    <div class="title">
      Jamboree
    </div>

    <div class="social">

      <a href="https://www.instagram.com/jamboreeoficial/"><i class="fab fa-instagram"></i></a>
      <a href="https://twitter.com/Jambore29165571"><i class="fab fa-twitter"></i></a>
    </div>

  </header>

  <!--MAIN-->
  <main>
    <div class="maindiv">
      <div class="log">
        <input type="checkbox" name="" id="show">
        <input type="checkbox" name="" id="reg">
        <label for="show" class="open-btn">Entrar</label>

        <div class="Loginform">
          <label for="show" class="close-btn fas fa-times"></label>Inicio de sesión</br>
          </br>
          <form action="validar.php" method="post">

            <div class="data">
              <p>Usuario</p>
              <input type="text" name="username" id="">
            </div>
            <div class="data">
              <p><br>Contraseña</p>
              <input type="password" name="password" id="">
            </div>

            <div class="btn">
              <button type="submit" name='log'><i class="fas fa-play"></i></button>
            </div>

            <div class="LinkRegister"><br><a href="register.php">¿No estás registrado? Regístrate</a></div>
          </form>
        </div>
        <!-- HACER popup para formulario de inicio o registro -->

      </div>
      <div class="text">The fastest way from your brain to your speakers</div>

      <div class="video">

          <video src="../../media/2.mp4" type="video/mp4" autoplay muted loop controls></video>

      </div>
    </div>
    <div class="divcarousel">
      <div class="textcarousel">
        <div id="title">
          <h1>Conviértete en tus artistas favoritos</h1>
        </div>
        <div>
          <h2>Estudio</h2>
          <p>Da rienda suelta a tu creatividad con un estudio diseñado para un manejo sencillo y online.</p>
        </div>
        <div>
          <h2>Foro</h2>
          <p>Comparte tus temas, visualiza los de otros usarios y lucha por estar en los hits más escuchados.</p>
        </div>
        <div>
          <h2>Audioteca</h2>
          <p>Almacena tus creaciones o importa la de otros usarios para enriquecer tu colección privada de ritmos y loops.</p>
        </div>
      </div>
      <div class="card-carousel">
        <div class="my-card"></div>
        <div class="my-card"></div>
        <div class="my-card"></div>
        <div class="my-card"></div>
        <div class="my-card"></div>
      </div>
      <div class="div-musicboton">
        <div class="buton">
          <button class="reproductorHouse">House</button>
          <p><br>¿Como se hace?<img src="../../media/Images/House.PNG" alt=""></p>
        </div>

        <div class="buton">
          <button class="reproductorRap">Reggeaton</button>
          <p><br>¿Como se hace?<img src="../../media/Images/Regueton.PNG" alt=""></p>
        </div>

      </div>
    </div>
    <div class="finaldiv">
      <div class="section">
        <div class="textimg">
          <h2>Estudio</h2>
          <p>El estudio será tu espacio de creación, tu pequeña cueva musical donde dejar fluir tu creatividad con su channel rack integrado y diversas funcionalidades como el control de bpm, mute...</p>
        </div>
        <div class="img"><img src="../../media/Images/estudio.png" alt=""></div>
      </div>
      <div class="section">
        <div class="textimg">
          <h2>Foro</h2>
          <p>El foro es un sitio agradable que comparte la comunidad para mostrar canciones o escucharlas ya seas un aficionado de la producción o un simple amante de la musica o incluso un manager de talentos musicales.</p>
        </div>
        <div class="img"><img src="../../media/Images/foro.png" alt=""></div>
      </div>
      <div class="section">
        <div class="textimg">
          <h2>Audioteca</h2>
          <p>La Audioteca es un espacio donde podrás guardar todas aquellas canciones o beats que más te interesen desde el estudio. Además desde ahí tendrás la opción de subirlas al foro para que todos los artistas las observen.</p>
        </div>
        <div class="img"><img src="../../media/Images/audioteca.png" alt=""></div>
      </div>
    </div>



  </main>
  <!--FOOTER-->
  <footer>
    <div class="contactos">© 2021 Jamboree Software</div>
    <div class="lopd"><a href="../privacidad.html">Política de privacidad</a></div>
  </footer>
</body>

</html>