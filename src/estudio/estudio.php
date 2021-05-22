<?php
echo "prueba en xampp hub"
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudio</title>

    <!-- Link para poner icono .fav -->
    <link rel="icon" type="image/x-icon" href="/" />

    <!-- kit de iconos -->
    <script src="https://kit.fontawesome.com/62afea99ed.js" crossorigin="anonymous"></script>

    <!-- link para jquery -->
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <!-- link para Tone.js -->
    <script src="https://tonejs.github.io/build/Tone.js"></script>

    <script src="estudio.js"></script>
    <script>
        //script para pintar en compases de a 4
        $(document).ready(function() {
            let cont = 0
            for (let i = 1; i <= 32; i++) {
                if (cont < 4) {
                    $(".beat." + i).addClass("impar")
                    cont++
                } else {
                    cont = cont - 4
                    i = i + 3
                }
            }
        })
    </script>

    <link rel="stylesheet/less" href="estudio.less">
    <script src="../less.min.js" type="text/javascript"></script>
</head>

<body>
    <?php
    if (isset($_GET['user'])) {
        setcookie("id_User", $_GET['user'], time() + 3600);
    }
    ?>

    <div class="cabecera">
        <div class="logo">
            JAMBOREE
        </div>
        <div class="volver">
            <a href="../main/main.php">
                <i class="far fa-times-circle fa-3x"></i>
            </a>
        </div>
        <div class="ayuda">
            <a href="../ayuda.html">
                <i class="fas fa-question fa-2x"></i>
            </a>
        </div>

    </div>

    <div class="main">
        <div class="channel_rack">
            <div class="track kick">
                <div class="controls">
                    <i class="fas fa-volume-mute"></i>
                    <i class="fab fa-stripe-s fab-3x"></i>
                </div>

                <div class="track_name">Kick</div>
                <div class="beat 1"></div>
                <div class="beat 2"></div>
                <div class="beat 3"></div>
                <div class="beat 4"></div>
                <div class="beat 5"></div>
                <div class="beat 6"></div>
                <div class="beat 7"></div>
                <div class="beat 8"></div>
                <div class="beat 9"></div>
                <div class="beat 10"></div>
                <div class="beat 11"></div>
                <div class="beat 12"></div>
                <div class="beat 13"></div>
                <div class="beat 14"></div>
                <div class="beat 15"></div>
                <div class="beat 16"></div>
                <div class="beat 17"></div>
                <div class="beat 18"></div>
                <div class="beat 19"></div>
                <div class="beat 20"></div>
                <div class="beat 21"></div>
                <div class="beat 22"></div>
                <div class="beat 23"></div>
                <div class="beat 24"></div>
                <div class="beat 25"></div>
                <div class="beat 26"></div>
                <div class="beat 27"></div>
                <div class="beat 28"></div>
                <div class="beat 29"></div>
                <div class="beat 30"></div>
                <div class="beat 31"></div>
                <div class="beat 32"></div>
            </div>
            <div class="track snare">
                <div class="controls">
                    <i class="fas fa-volume-mute"></i>
                    <i class="fab fa-stripe-s fab-3x"></i>
                </div>
                <div class="track_name">Snare</div>
                <div class="beat 1"></div>
                <div class="beat 2"></div>
                <div class="beat 3"></div>
                <div class="beat 4"></div>
                <div class="beat 5"></div>
                <div class="beat 6"></div>
                <div class="beat 7"></div>
                <div class="beat 8"></div>
                <div class="beat 9"></div>
                <div class="beat 10"></div>
                <div class="beat 11"></div>
                <div class="beat 12"></div>
                <div class="beat 13"></div>
                <div class="beat 14"></div>
                <div class="beat 15"></div>
                <div class="beat 16"></div>
                <div class="beat 17"></div>
                <div class="beat 18"></div>
                <div class="beat 19"></div>
                <div class="beat 20"></div>
                <div class="beat 21"></div>
                <div class="beat 22"></div>
                <div class="beat 23"></div>
                <div class="beat 24"></div>
                <div class="beat 25"></div>
                <div class="beat 26"></div>
                <div class="beat 27"></div>
                <div class="beat 28"></div>
                <div class="beat 29"></div>
                <div class="beat 30"></div>
                <div class="beat 31"></div>
                <div class="beat 32"></div>
            </div>
            <div class="track hat">
                <div class="controls">
                    <i class="fas fa-volume-mute"></i>
                    <i class="fab fa-stripe-s fab-3x"></i>
                </div>
                <div class="track_name">Hi-hat</div>
                <div class="beat 1"></div>
                <div class="beat 2"></div>
                <div class="beat 3"></div>
                <div class="beat 4"></div>
                <div class="beat 5"></div>
                <div class="beat 6"></div>
                <div class="beat 7"></div>
                <div class="beat 8"></div>
                <div class="beat 9"></div>
                <div class="beat 10"></div>
                <div class="beat 11"></div>
                <div class="beat 12"></div>
                <div class="beat 13"></div>
                <div class="beat 14"></div>
                <div class="beat 15"></div>
                <div class="beat 16"></div>
                <div class="beat 17"></div>
                <div class="beat 18"></div>
                <div class="beat 19"></div>
                <div class="beat 20"></div>
                <div class="beat 21"></div>
                <div class="beat 22"></div>
                <div class="beat 23"></div>
                <div class="beat 24"></div>
                <div class="beat 25"></div>
                <div class="beat 26"></div>
                <div class="beat 27"></div>
                <div class="beat 28"></div>
                <div class="beat 29"></div>
                <div class="beat 30"></div>
                <div class="beat 31"></div>
                <div class="beat 32"></div>
            </div>
            <div class="track clap">
                <div class="controls">
                    <i class="fas fa-volume-mute"></i>
                    <i class="fab fa-stripe-s fab-3x"></i>
                </div>
                <div class="track_name">Clap</div>
                <div class="beat 1"></div>
                <div class="beat 2"></div>
                <div class="beat 3"></div>
                <div class="beat 4"></div>
                <div class="beat 5"></div>
                <div class="beat 6"></div>
                <div class="beat 7"></div>
                <div class="beat 8"></div>
                <div class="beat 9"></div>
                <div class="beat 10"></div>
                <div class="beat 11"></div>
                <div class="beat 12"></div>
                <div class="beat 13"></div>
                <div class="beat 14"></div>
                <div class="beat 15"></div>
                <div class="beat 16"></div>
                <div class="beat 17"></div>
                <div class="beat 18"></div>
                <div class="beat 19"></div>
                <div class="beat 20"></div>
                <div class="beat 21"></div>
                <div class="beat 22"></div>
                <div class="beat 23"></div>
                <div class="beat 24"></div>
                <div class="beat 25"></div>
                <div class="beat 26"></div>
                <div class="beat 27"></div>
                <div class="beat 28"></div>
                <div class="beat 29"></div>
                <div class="beat 30"></div>
                <div class="beat 31"></div>
                <div class="beat 32"></div>
            </div>

            <div class="slidecontainer">
                <input class="slider" type="range" min="1" max="100" value="50" id="myRange">
            </div>

            <div class="controles">
                <button>
                    <i class="fas fa-play fa-2x"></i>
                </button>
                <button>
                    <i class="fas fa-stop fa-2x"></i>
                </button>
                <button>
                    <i class="fas fa-save fa-2x"></i>
                </button>
                <button>
                    <i class="fas fa-eraser fa-2x"></i>
                </button>
            </div>
        </div>
    </div>
    </main>


</body>

</html>