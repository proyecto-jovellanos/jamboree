<?php
if (!isset($_COOKIE['id_User'])) {
    echo '<script type="text/javascript">
    alert("Tu sesión expiró, vuelve a iniciar sesión.");
    window.location.href="../src/index/index.php";
    </script>';
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi perfil</title>
    <link rel="icon" type="image/x-icon" href="/" />
    <!-- kit de iconos -->
    <script src="https://kit.fontawesome.com/62afea99ed.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Script propio -->
    <script src="menu.js"></script>
    <script src="perfil.js"></script>
    <link rel="stylesheet/less" href="perfil.less">
    <script src="less.min.js" type="text/javascript"></script>
</head>

<body>
    <header class="header">
        <div class="animation-header">
            <a href="main/main.php">JamBoree</a>
        </div>
        <ul class="menu-items">
            <li><a href="main/main.php">Inicio</a></li>
            <li><a href="foro/foro.php">Foro</a></li>
            <li><a href="audioteca/audioteca.php">Audioteca</a></li>
            <li><a href="estudio/estudio.html">Estudio</a></li>
            <li><a href="ayuda.html">Ayuda</a></li>
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
        <?php
        include("db.php");
        $user = $_COOKIE["id_User"];
        $consulta = "select * from users where username='$user'";
        $resultado = mysqli_query($conexion, $consulta);

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            echo
            '<div class="profile">
                <header class="user">
                <i class="fas fa-user"></i>' . $row['username'] . '
                </header>
                <div class="data">
                    <div> Fecha de nacimiento: ' . $row['fecha'] . ' </div>
                </div>
                <div class="botones">
                    <form action="index/index.php">
                        <input class="logout" type="submit" value="Cerrar sesión" name="logout">
                    </form>
                        <button id="abrirForm">Cambiar contraseña</button>
                </div>
                    <form style="display: none;" id="formChange" action="perfil.php" method="get">
                        <input type="password"  placeholder="Introduce nueva contraseña" name="new_p" autocomplete="new-password" required>
                        <input id="btnC" type="submit" name="btnChange" value="Actualizar contraseña" >
                    </form>        
            </div>';
        }
        if (isset($_GET['new_p'])) {
            $new_pass = $_GET['new_p'];
            $consulta = "update users SET contra='$new_pass' where username='$user'";
            mysqli_query($conexion, $consulta);
        }

        ?>

    </div>

    <footer>
        <div class="contactos">© 2021 Jamboree Software</div>
        <div class="lopd"><a href="privacidad.html">Política de privacidad</a></div>
        <div class="socialFo">
            <a href="https://www.instagram.com/jamboreeoficial/"><i class="fab fa-instagram"></i></a>
            <a href="https://twitter.com/Jambore29165571"><i class="fab fa-twitter"></i></a>
        </div>

    </footer>
</body>

</html>