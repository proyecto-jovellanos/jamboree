<!DOCTYPE html>
<html lang="es">

<head>



    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenid@ a Jamboree</title>  
    <!-- JQUERY -->
    
    <!-- JS PROPIO -->
    
    <!-- LESS -->
    <link rel="stylesheet" href="index.less">
    <!--FONT AWESOME-->
   <script src="https://kit.fontawesome.com/e36b117475.js" crossorigin="anonymous"></script>
    <!--MATERIALIZE-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    
    

</head>

<body>

  <script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script src="carousel.js"></script>
    
   <!--HEADER -->
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

    <!--MAIN-->
    <main>
      <div class="maindiv">
        <div class="video">
        <video width="500" height="395"  muted loop autoplay> 
  <source src="rockstar.mp4" type="video/mp4">


</video>
        </div>

        <div class="carousel">
          <div class="carousel-item">
            <img src="1.png" alt="">
            <p>David Guetta</p>
          </div>
          <div class="carousel-item">
            <img src="3.jpg" alt="">
            <p>Alesso</p>
          </div> 
          <div class="carousel-item">
            <img src="4.jpg" alt="">
            <p>Nick Mira</p>
            </div>
            <div class="carousel-item">
            <img src="5.jpg" alt="">
            <p>Travis Scott</p>
            </div>
            <div class="carousel-item">
            <img src="6.jpg" alt="">
            <p>Post Malone</p>
            </div>
          </div>            
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
              <a href="">Forgot password?</a><br>
              <div class="btn">
                <button type="submit"><i class="fas fa-play"></i></button>
              </div>
              
              <div class="LinkRegister"><br><a href="register.php">No estas registrado?Registrate</a></div>
            </form>
            </div>
            <!-- HACER popup para formulario de inicio o registro -->
            
          </div>
        </div>
    </main>
    <!--FOOTER-->
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
        $fecha=$_POST['fecha'];
        $etiquetas=$_POST['etiquetas'];
        include("db.php");
        $consulta="INSERT INTO users (Username, Contra,fecha,etiquetas) VALUES ('$user','$passw','$fecha','$etiquetas')";
        mysqli_query($conexion,$consulta);
        echo $user;
        echo 'heloo';


   
}



?>

       
    

</body>

</html>