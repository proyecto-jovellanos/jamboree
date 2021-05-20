<?php
//si se ha dado a cualquiera de los boton de "enviar" se inicia funcion escritora
if ($_POST['option'] == "guardar") {
    //$nombre = $_POST['nombre'];
    //$texto = $_POST['texto'];
    $content = json_decode($_POST['track']);
    //recoger cookie de id usuario
    //$Id_User=
    $name = $content->name;
    $track = $content->track;
    include("db.php");

    $consulta = "INSERT INTO canciones VALUES (null,'$track',null,'$Id_User','$name')";
    mysqli_query($conexion, $consulta);
}

//al cargarse la página se inicia la descarga de datos
elseif ($_POST['option'] == "cargar") {
    $IdCancion = $_POST['id_cancion'];
    include("db.php");
    $consulta = "SELECT * FROM canciones where  Id_Cancion='$IdCancion'";
    $resultado = mysqli_query($conexion, $consulta);
    $resultado = json_encode($resultado);
    echo $resultado;
}
