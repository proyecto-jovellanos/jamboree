<?php
include("db.php");

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
    $consulta = "INSERT INTO canciones(id_Cancion,track,etiquetas,username,nombre) 
    VALUES (null,'$content','$tag','$id_User','$song_name')";
    mysqli_query($conexion, $consulta);
    $conexion->close();
}

//al cargarse la página se inicia la descarga de datos
elseif ($_POST['option'] == "cargar") {
    $IdCancion = $_POST['id_cancion'];
    $consulta = "SELECT * FROM canciones where  Id_Cancion='$IdCancion'";
    $resultado = mysqli_query($conexion, $consulta);
    $resultado = json_encode($resultado);
    echo $resultado;
}

//si se pulsó en borrar desde audioteca
elseif ($_POST['option'] == "borrar") {
    $id_song = $_POST['id_song'];
    $consulta = "DELETE FROM canciones where  Id_Cancion='$id_song'";
    mysqli_query($conexion, $consulta);
    $conexion->close();
}
//si viene de audioteca o foro, devuelve el track pedido
elseif ($_POST['option'] == "get") {
    $id_song = $_POST['id_song'];
    $consulta = "SELECT * FROM canciones where  Id_Cancion='$id_song'";
    $resultado = mysqli_query($conexion, $consulta);

    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo $row['track'];
    }
    /*  $resultado = json_encode($resultado);
    echo $resultado; */
    $conexion->close();
}
