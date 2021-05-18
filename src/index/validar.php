<?php
             
             $usuario=$_POST['username'];
             $contraseña=$_POST['password'];
             session_start();
             $_SESSION['usuario']=$usuario;
             include('db.php');
             $consulta="SELECT*FROM user where  Username='$usuario' and Contra='$contraseña'";
             $resultado=mysqli_query($conexion,$consulta);
             $filas=mysqli_num_rows($resultado);


             if($filas){
               header("location:/main/main.html");
             }else{
               ?>
               <?php

               include("index.php")
               ?>
               <div id="error">
               <h1>error autentificacion</h1>
               <button type="submit" ><a href="index.php">Otra vez</a></button>
               </div>
               <?php
             }
             mysqli_free_result($resultado);
             mysqli_close($conexion);
             ?>