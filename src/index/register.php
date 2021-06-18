<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/e36b117475.js" crossorigin="anonymous"></script>
    <!-- LESS -->
    <link rel="stylesheet/less" href="register.less">
    <script src="../less.min.js" type="text/javascript"></script>
</head>

<body>
<header>
<div class="title">
      Jamboree
    </div>

    <div class="social">

      <a href="https://www.instagram.com/jamboreeoficial/"><i class="fab fa-instagram"></i></a>
      <a href="https://twitter.com/Jambore29165571"><i class="fab fa-twitter"></i></a>

    </div>
  </header>
  <main>
    <form action="../index/index.php" method="post">
        <div class="dataRegister">
            <div class="sectionRegister">
                <p>Usuario</p>
                <input type="text" name="user" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Contraseña</p>
                <input type="password" name="password" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Fecha Nacimiento</p>
                <input type="date" name="fecha" id="" required>
            </div>
            <input type="submit" value="Registrarse" class="sendRegister" name="register">

        </div>
    </form>
</main>
    <!--FOOTER-->
    <footer>
    <div class="contactos">© 2021 Jamboree Software</div>
    <div class="lopd"><a href="../privacidad.html">Política de privacidad</a></div>
  </footer>

</body>

</html>