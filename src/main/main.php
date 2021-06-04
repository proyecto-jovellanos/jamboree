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
    <script src="main.js"></script>

    <!-- LESS -->
    <link rel="stylesheet/less" href="main.less">
    <script src="../less.min.js" type="text/javascript"></script>

</head>

<body>
    <!-- esto era una imagen de cara, pero tardaba la propia imagen de carga -->
    <!-- <div id="loading">
        <img id="loading-image" src="../../media/Images/loading.gif" alt="Loading..." />
    </div> -->
    <header>
        <div class="logo">
            Jamboree
        </div>
        <div class="nav">
            <div class="social">
                <a><i class="fab fa-twitter"></i></a>
                <a><i class="fab fa-facebook"></i></a>
                <a><i class="fab fa-instagram"></i></a>
            </div>
            <div class="links">
                <a href="../perfil.php">Mi perfil</a>
                <a href="../ayuda.html">Ayuda</a>
            </div>
        </div>
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
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>
    </footer>
    <script>

    </script>
</body>


</html>