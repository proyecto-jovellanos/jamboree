<?php
//si se ha dado a cualquiera de los boton de "enviar" se inicia funcion escritora
if ($_POST['option'] == "guardar") {
    print "funca";
    //$content = json_decode($_POST['track'], true);
    $content = $_POST['track'];
    $id_User = $_POST['id_User'];
    $song_name = $_POST['song_name'];
    $tag = $_POST['tag'];
    print $id_User;
    //var_dump($content);
    include("db.php");
    $consulta = "INSERT INTO canciones(id_Cancion,track,etiquetas,username,nombre) 
    VALUES (null,'$content','$tag','$id_User','$song_name')";
    mysqli_query($conexion, $consulta);
    $conexion->close();
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
