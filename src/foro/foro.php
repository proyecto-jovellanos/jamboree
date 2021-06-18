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
    <title>Foro Jamboree</title>
    <link rel="icon" type="image/x-icon" href="/" />
    <!-- kit de iconos -->
    <script src="https://kit.fontawesome.com/62afea99ed.js" crossorigin="anonymous"></script>

    <!-- JQUERY -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- link para Tone.js -->
    <script src="https://tonejs.github.io/build/Tone.js"></script>

    <!-- link para Wave.js -->
    <script src="https://cdn.jsdelivr.net/gh/foobar404/wave.js/dist/bundle.iife.js"></script>

    <!-- Script propio -->
    <script src="../menu.js"></script>
    <script src="foro.js"></script>
    <script>
        $(document).ready(function() {
            $(".far").on("click", function(ev) {
                ev.preventDefault()
                $(this).toggleClass("fas")
            })
        })
    </script>
    <link rel="stylesheet/less" href="foro.less">
    <script src="../less.min.js" type="text/javascript"></script>
</head>

<body>
    <header class="header">
        <div class="animation-header">
            <a href="../main/main.php">JamBoree</a>
        </div>
        <ul class="menu-items">
            <li><a href="../main/main.php">Inicio</a></li>
            <li><a href="../estudio/estudio.html">Estudio</a></li>
            <li><a href="../audioteca/audioteca.php">Audioteca</a></li>
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
        <section class="listado">
            <div class="tags">
                <div><a class="etiqueta" href="foro.php">Todas</a></div>
                <div><a class="etiqueta" href="foro.php?tag=rock">Rock</a></div>
                <div><a class="etiqueta" href="foro.php?tag=hip-hop">Hip-hop</a></div>
                <div><a class="etiqueta" href="foro.php?tag=techno">Techno</a></div>
                <div><a class="etiqueta" href="foro.php?tag=pop">Pop</a></div>
            </div>
            <?php
            include("listadoCanciones.php");
            include("db.php");
            $consulta = 'select * from canciones where publica="1"';
            if (isset($_GET['tag'])) {
                $tag = $_GET['tag'];
                $consulta = $consulta . " and etiquetas='$tag' ORDER BY 1 DESC";
            } else {
                $consulta = $consulta . " ORDER BY 1 DESC";
            }
            $leer = mysqli_query($conexion, $consulta);
            listar($leer);
            ?>
        </section>
        <div class="aside">
            <div class="sidebar">
                <div class="most-visited">
                    <span>HITS DEL MOMENTO</span>
                    <?php
                    include("listadoCancionesTop.php");
                    include("db.php");
                    $leerTop = mysqli_query($conexion, 'select * from canciones where publica="1" ORDER BY escuchas DESC LIMIT 10');
                    listarTop($leerTop);
                    ?>
                </div>
            </div>
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