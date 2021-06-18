<?php
if (!isset($_COOKIE['id_User'])) {
    echo '<script type="text/javascript">
    alert("Tu sesión expiró, vuelve a iniciar sesión.");
    window.location.href="../index/index.php";
    </script>';
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Audioteca</title>
    <link rel="icon" type="image/x-icon" href="/" />
    <!-- kit de iconos -->
    <script src="https://kit.fontawesome.com/62afea99ed.js" crossorigin="anonymous"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- link para Tone.js -->
    <script src="https://tonejs.github.io/build/Tone.js"></script>

    <!-- Script propio -->
    <script src="../menu.js"></script>
    <script src="audioteca.js"></script>

    <script>
        $(document).ready(function() {
            $(".far").on("click", function(ev) {
                ev.preventDefault()
                $(this).toggleClass("fas")
            })
        })
    </script>
    <link rel="stylesheet/less" href="audioteca.less">
    <script src="../less.min.js" type="text/javascript"></script>
</head>

<body>
    <header class="header">
        <div class="animation-header">
            <a href="../main/main.php">JamBoree</a>
        </div>
        <ul class="menu-items">
            <li><a href="../main/main.php">Inicio</a></li>
            <li><a href="../foro/foro.php">Foro</a></li>
            <li><a href="../estudio/estudio.html">Estudio</a></li>
            <li><a href="../ayuda.html">Ayuda</a></li>
            <li><a href="../perfil.php">Mi perfil</a></li>
        </ul>
        <div class="social">
            <a href="https://www.instagram.com/jamboreeoficial/"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/Jambore29165571"><i class="fab fa-twitter"></i></a>
        </div>
        <span class="btn_menu">
            <i class="fas fa-bars"></i>
        </span>
    </header>
    <div class="main">
        <div class="titulo">
            <?php
            echo 'Audioteca de ' . $_COOKIE['id_User'] . '';
            ?>
        </div>
        <div class="lista_audioteca">
            <?php
            include("cancionesUsuario.php");
            include("../db.php");
            $leer = mysqli_query($conexion, 'select * from canciones where username="' . $_COOKIE['id_User'] . '" order by 1 desc');
            listar($leer);
            ?>
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

</body>

</html>