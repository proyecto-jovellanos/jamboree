<?php
$conexion=mysqli_connect("localhost","root","","jamboree");
if ($conexion->connect_error) {
    die("Connection failed: " . $conexion->connect_error);
    echo "MALL";
  }
//  echo "Connected successfully";
