<?php
if (!isset($_COOKIE['id_User'])) {
    echo '<script type="text/javascript">
    alert("Tu sesión expiró, vuelve a iniciar sesión.");
    window.location.href="../index/index.php";
    </script>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>

    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/e36b117475.js" crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

    <!-- JS PROPIO -->
    <script src="../menu.js"></script>
    <script src="main.js"></script>

    <!-- LESS -->
    <link rel="stylesheet/less" href="main.less">
    <script src="../less.min.js" type="text/javascript"></script>

</head>

<body>
    <!-- esto era una imagen de carga, pero tardaba la propia imagen de carga -->
    <!-- <div id="loading">
        <img id="loading-image" src="../../media/Images/loading.gif" alt="Loading..." />
    </div> -->
    <header class="header">
        <div class="animation-header">
            Jamboree
        </div>
        <span class="btn_menu">
            <i class="fas fa-bars"></i>
        </span>
        <ul class="menu-items">
            <li><a href="../perfil.php">Mi perfil</a></li>
            <li><a href="../ayuda.html">Ayuda</a></li>
        </ul>
    </header>

    <div class="main">
        <div class="boton foro">
            <div class="sombra"></div>
            <a href="../foro/foro.php">Foro</a>
        </div>

        <div class="boton estudio show">
            <div class="sombra"></div>
            <a href="../estudio/estudio.html">Estudio</a>
        </div>
        <div class="boton audioteca">
            <div class="sombra"></div>
            <a href="../audioteca/audioteca.php">Audioteca</a>
        </div>

    </div>

    <footer>
        <div class="contactos">© 2021 Jamboree Software</div>
        <div class="lopd"><a href="../privacidad.html">Política de privacidad</a></div>
        <div class="socialFo">
            <a href="https://www.instagram.com/jamboreeoficial/"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/Jambore29165571"><i class="fab fa-twitter"></i></a>
        </div>
    </footer>
    <script>

    </script>
</body>


</html>