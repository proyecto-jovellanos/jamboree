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
  <main>
    <form action="../index/index.php" method="post">
        <div class="dataRegister">
            <div class="sectionRegister">
                <p>Username</p>
                <input type="text" name="user" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Contraseña</p>
                <input type="password" name="password" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Repite la Contraseña</p>
                <input type="password" name="password" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Fecha</p>
                <input type="date" name="fecha" id="" required>
            </div>
            <input type="submit" value="SEND" class="sendRegister" name="register">

        </div>
    </form>
</main>
    <!--FOOTER-->
  <footer>
    <div class="contactos">Nuestros nombres</div>
    <div class="lopd">ley organica proteccion datos, cookies...</div>
    <div class="year">AÑO y Copyright</div>
  </footer>

</body>

</html>