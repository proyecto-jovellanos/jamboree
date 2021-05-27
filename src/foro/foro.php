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
    <div class="main">
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
                <a href="../perfil.html">Mi perfil</a>
            </div>
            <div class="social">
                <a href="#"><i class="fab fa-instagram"></i></a>
                <a href="#"><i class="fab fa-twitter"></i></a>
                <a href="#"><i class="fab fa-facebook-square"></i></a>
            </div>
        </header>
        <div class="sidebar">
            <div class="most-visited">
                <span>HITS DEL MOMENTO</span>
                <?php
                include("listadoCancionesTop.php");
                include("db.php");
                $leer = mysqli_query($conexion, 'select * from canciones where publica="1" ORDER BY escuchas LIMIT 10');
                listar($leer);
                ?>

                <li>
                    <a href="#"><span class=par>1.</span>tema Primero</a><br>
                    <span><i class="far fa-eye"></i> 4525</span>
                </li>
                <li>
                    <span class="nombre-song-top">' . $row['nombre'] . '</span>
                    <span class="nombre-user-top">' . $row['username'] . '</span>
                    <span class="id_song"> ' . $row['id_Cancion'] . '</span>
                    <span class="cancion"> ' . $row['track'] . '</span>
                    <button class="play"><i class="fas fa-play"></i></i></button></button>
                    <button class="pause"><i class="fas fa-pause"></i></i></button></button>
                </li>
                <li>
                    <a href="#"><span class=par>2.</span>tema Segundo</a><br>
                    <span><i class="far fa-eye"></i> 4105</span>
                </li>
                <li>
                    <a href="#"><span class=par>3.</span>tema Tercero</a><br>
                    <span><i class="far fa-eye"></i> 3215</span>
                </li>
                <li>
                    <a href="#"><span class=par>4.</span>tema Cuarto</a><br>
                    <span><i class="far fa-eye"></i> 2565</span>
                </li>
                <li>
                    <a href="#"><span class=par>5.</span>tema Quinto</a><br>
                    <span><i class="far fa-eye"></i> 2005</span>
                </li>
                <li>
                    <a href="#"><span class=par>6.</span>tema Tercero</a><br>
                    <span><i class="far fa-eye"></i> 3215</span>
                </li>
                <li>
                    <a href="#"><span class=par>7.</span>tema Cuarto</a><br>
                    <span><i class="far fa-eye"></i> 2565</span>
                </li>
                <li>
                    <a href="#"><span class=par>8.</span>tema Quinto</a><br>
                    <span><i class="far fa-eye"></i> 2005</span>
                </li>
                <li>
                    <a href="#"><span class=par>9.</span>tema Tercero</a><br>
                    <span><i class="far fa-eye"></i> 3215</span>
                </li>
                <li>
                    <a href="#"><span class=par>10.</span>tema Cuarto</a><br>
                    <span><i class="far fa-eye"></i> 2565</span>
                </li>
            </div>
        </div>
        <section class="noticias">
            <?php
            include("listadoCanciones.php");
            include("db.php");
            $leer = mysqli_query($conexion, 'select * from canciones where publica="1"');
            listar($leer);
            ?>
        </section>
    </div>

    <footer>
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>
    </footer>
</body>

</html>