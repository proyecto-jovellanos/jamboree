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

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- link para Tone.js -->
    <script src="https://tonejs.github.io/build/Tone.js"></script>

    <!-- Script propio -->
    <script src="foro.js"></script>
    <script>
        $(document).ready(function() {
            $(".far").on("click", function(ev) {
                ev.preventDefault()
                $(this).toggleClass("fas")
            })
        })
    </script>
    <link rel="stylesheet/less" href="styleForo.less">
    <script src="../less.min.js" type="text/javascript"></script>
</head>

<body>
    <header class="header">
        <div class="animation-header">
            <div class="lft">[</div>
            Jamboree
            <div class="rght">]</div>
        </div>
        <div class="nav">
            <a href="../main/main.php">Inicio</a>
            <a href="../estudio/estudio.html">Estudio</a>
            <a href="../audioteca/audioteca.php">Audioteca</a>
            <a href="../ayuda.html">Ayuda</a>
            <a href="../perfil.php">Mi perfil</a>
        </div>
        <div class="social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
        </div>
    </header>
    <div class="main">
        <div class="tags">
            <div><a class="etiqueta" href="foro.php">Todas</a></div>
            <div><a class="etiqueta" href="foro.php?tag=rock">Rock</a></div>
            <div><a class="etiqueta" href="foro.php?tag=hip-hop">Hip-hop</a></div>
            <div><a class="etiqueta" href="foro.php?tag=techno">Techno</a></div>
            <div><a class="etiqueta" href="foro.php?tag=pop">Pop</a></div>
        </div>
        <section class="listado">
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
    </div>
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


    <footer>
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>

    </footer>
</body>

</html>