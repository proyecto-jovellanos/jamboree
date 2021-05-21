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

    <script>
        $(document).ready(function() {
            $(".far").on("click", function(ev) {
                ev.preventDefault()
                $(this).toggleClass("fas")
            })

        })
    </script>
    <link rel="stylesheet/less" href="audioteca.less">
    <script src="less.min.js" type="text/javascript"></script>
</head>

<body>
    <?php
    if (isset($_GET['user'])) {
        setcookie("id_User", $_GET['user'], time() + 3600);
    }
    ?>
    <header class="header">
        <div class="animation-header">
            <div class="lft">[</div>
            Jamboree
            <div class="rght">]</div>
        </div>
        <div class="nav">
            <a href="../main/main.html">Inicio</a>
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
            <article class="tema grow">
                <header class="header-tema">
                    Tema 1
                </header>
                <button class="icono"><i class="far fa-trash-alt"></i></button>
                <button class="btn"><a href="../estudio/estudio.html">Editar</a></button>
                <button class="btn">Reproducir</button>
                <button class="btn">Subir a Foro</button>
            </article>
            <article class="tema grow">
                <header class="header-tema">
                    Tema 2
                </header>
                <button class="icono"><i class="far fa-trash-alt"></i></button>
                <button class="btn"> <a href="../estudio/estudio.html">Editar</a></button>
                <button class="btn">Reproducir</button>
                <button class="btn">Subir a Foro</button>
            </article>
            <article class="tema grow">
                <header class="header-tema">
                    Tema 3
                </header>
                <button class="icono"><i class="far fa-trash-alt"></i></button>
                <button class="btn"> <a href="../estudio/estudio.html">Editar</a></button>
                <button class="btn">Reproducir</button>
                <button class="btn">Subir a Foro</button>
            </article>
            <article class="tema grow">
                <header class="header-tema">
                    Tema 4
                </header>
                <button class="icono"><i class="far fa-trash-alt"></i></button>
                <button class="btn"> <a href="../estudio/estudio.html">Editar</a></button>
                <button class="btn">Reproducir</button>
                <button class="btn">Subir a Foro</button>
            </article>
            <article class="tema grow">
                <header class="header-tema">
                    Tema 5
                </header>
                <button class="icono"><i class="far fa-trash-alt"></i></button>
                <button class="btn"> <a href="../estudio/estudio.html">Editar</a></button>
                <button class="btn">Reproducir</button>
                <button class="btn">Subir a Foro</button>
            </article>
        </div>
    </div>

    <footer>
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>
    </footer>
</body>

</html>