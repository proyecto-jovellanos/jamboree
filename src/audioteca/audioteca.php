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
    
    <!-- Script propio -->
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
            <div class="lft">[</div>
            Jamboree
            <div class="rght">]</div>
        </div>
        <div class="nav">
            <a href="../main/main.php">Inicio</a>
            <a href="../ayuda.html">Ayuda</a>
            <a href="../perfil.html">Mi perfil</a>
        </div>
        <div class="social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
        </div>
    </header>
    <div class="main">
        <div class="lista_audioteca">
            <?php
            include("cancionesUsuario.php");
            include("db.php");
            $leer = mysqli_query($conexion, 'select * from canciones where username="' . $_COOKIE['id_User'] . '"');
            listar($leer);
            ?>
        </div>
    </div>

    <footer>
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>
    </footer>
</body>

</html>