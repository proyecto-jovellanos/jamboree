<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!--FONT AWESOME-->
    <script src="https://kit.fontawesome.com/e36b117475.js" crossorigin="anonymous"></script>
    <!-- LESS -->
    <link rel="stylesheet" href="register.less">

</head>

<body>
    <form action="../index/index.php" method="post">
        <div class="dataRegister">
            <div class="sectionRegister">
                <p>Username</p>
                <input type="text" name="user" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Contraseña</p>
                <input type="password" name="password" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Repite la Contraseña</p>
                <input type="password" name="password" id="" required>
            </div>
            <div class="sectionRegister">
                <p>Fecha</p>
                <input type="date" name="fecha" id="" required>
            </div>
            <div class="sectionRegister">
                <p>etiquetas</p>
                <input type="text" name="etiquetas" id="" required>
            </div>
            <input type="submit" value="send" class="sendRegister" name="register">

        </div>
    </form>

</body>

</html>