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
    <title>Mi perfil</title>
    <link rel="icon" type="image/x-icon" href="/" />
    <!-- kit de iconos -->
    <script src="https://kit.fontawesome.com/62afea99ed.js" crossorigin="anonymous"></script>
    <!-- JQuery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
    <!-- Script propio -->
    <script src="perfil.js"></script>
    <link rel="stylesheet/less" href="perfil.less">
    <script src="less.min.js" type="text/javascript"></script>
</head>

<body>
    <header class="header">
        <div class="animation-header">
            <div class="lft">[</div>
            Jamboree
            <div class="rght">]</div>
        </div>
        <div class="nav">
            <a href="main/main.php">Inicio</a>
            <a href="estudio/estudio.html">Estudio</a>
            <a href="audioteca/audioteca.php">Audioteca</a>
            <a href="foro/foro.php">Foro</a>
            <a href="ayuda.html">Ayuda</a>
        </div>
        <div class="social">
            <a href="#"><i class="fab fa-instagram"></i></a>
            <a href="#"><i class="fab fa-twitter"></i></a>
            <a href="#"><i class="fab fa-facebook-square"></i></a>
        </div>
    </header>
    <div class="main">
        <?php
        include("db.php");
        $user = $_COOKIE["id_User"];
        $consulta = "select * from user where username='$user'";
        $resultado = mysqli_query($conexion, $consulta);

        if ($resultado->num_rows > 0) {

            while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
                echo
                '<div class="profile">
                        <header class="user">
                        ' . $row['username'] . '
                        </header>
                        <main>
                            <div id=""> Fecha de nacimiento:' . $row['fecha'] . ' </div>
                            <div id=""> Contraseña:' . $row['contra'] . '</div>
                        </main>        
                </div>';
            }
        }

        ?>
    </div>

    <footer>
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>

    </footer>
</body>

</html>