<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@ a Jamboree</title>  
    <!-- TONE.JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tone/14.8.13/Tone.js"
        integrity="sha512-SAB2YrHeaZfb6W1w+tAMm+IUICzUMyf7TJ8upY+NjLYl8jseufUW4yYzoSHfNL9N2rzDlw5PWJrf7rPIQ6VhNw=="
        crossorigin="anonymous"></script>
    <!-- JQUERY -->
    <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- JS PROPIO -->
    <script src="app.js"></script>
    <!-- LESS -->
    <link rel="stylesheet" href="index.css">
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

    </header>
    <main>
        <div class="video">
            <video src="#">ER VIDEO</video>
        </div>

        <div class="carousel">
          <div class="carousel-item-visible">
            <img src="1.png" alt="">
          </div>
          <div class="carousel-item">
            <img src="1.png" alt="">
          </div>
          <div class="carousel-item">
            <img src="1.png" alt="">
          </div>
          <div class="carousel-actions">
            <button id="carousel-button--prev"><</button>
            <button id="carousel-button--next">></button>
          </div>
            
            
        </div>
        <div class="log">
          <input type="checkbox" name="" id="show">
          <input type="checkbox" name="" id="reg">
            <label for="show" class="open-btn">Entrar</label>

          <div class="Loginform">
            <label for="show" class="close-btn fas fa-times"></label>Login Form</br>
            </br><form action="validar.php" method="post">
              
                <div class="data">
                <p>Username</p>
                <input type="text" name="username" id="">
              </div>
              <div class="data">
                <p><br>Password</p>
                <input type="password" name="password" id="">
              </div>
              <a href="">Forgot password?</a>
              <div class="btn">
                <button type="submit"><i class="fas fa-play"></i></button>
              </div>
              
              <div class="LinkRegister"><br><a href="register.php">No estas registrado?Registrate</a></div>
            </form>
            </div>
            <!-- HACER popup para formulario de inicio o registro -->
            
        </div>

    </main>

    <footer>
        <div class="contactos">Nuestros nombres</div>
        <div class="lopd">ley organica proteccion datos, cookies...</div>
        <div class="year">AÑO y Copyright</div>
    </footer>
    <script >
      
    </script>
    <?php
      if (isset($_POST['empieza'])) {
        $user=$_POST['user'];
        $passw=$_POST['password'];
        include("db.php");
        $consulta="INSERT INTO user (Username, Contra) VALUES ('$user','$passw')";
        mysqli_query($conexion,$consulta);
        echo $user;
        echo 'heloo';


   
}



?>

       
    
    
</body>

</html>