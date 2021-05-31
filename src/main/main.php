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
    <!-- TONE.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.13/Tone.js" integrity="sha512-SAB2YrHeaZfb6W1w+tAMm+IUICzUMyf7TJ8upY+NjLYl8jseufUW4yYzoSHfNL9N2rzDlw5PWJrf7rPIQ6VhNw==" crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- JS PROPIO -->
    <!-- <script src="app.js"></script> -->
    <!-- LESS -->
    <link rel="stylesheet/less" href="main.less">
    <script src="../less.min.js" type="text/javascript"></script>
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/e36b117475.js" crossorigin="anonymous"></script>
</head>

<body>
    <header>
        <div class="logo">
            Jamboree
        </div>
        <div class="social">
            <ul>
                <li><i class="fab fa-twitter"></i></li>
                <li><i class="fab fa-facebook"></i></li>
                <li><i class="fab fa-instagram"></i></li>
            </ul>
        </div>

        <div class="nav">
            <a href="../perfil.html">Mi perfil</a>
            <a href="../ayuda.html">Ayuda</a>
            <form action="../index/index.php">
                <input type="submit" value="LOG OUT" name="logout">
            </form>
        </div>

    </header>

    <main>
        <div class="boton_foro">
            <button>
                <a href="../foro/foro.php">Foro</a>
            </button>
        </div>

        <div class="boton_estudio">
            <button>
                <a href="../estudio/estudio.html">Estudio</a>
            </button>
        </div>
        <div class="boton_audioteca">
            <button>
                <a href="../audioteca/audioteca.php">Audioteca</a>
            </button>
        </div>

    </main>

    <footer>
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>
    </footer>
</body>


</html>