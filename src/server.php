<?php
//si se ha dado a cualquiera de los boton de "enviar" se inicia funcion escritora
if ($_POST['option'] == "guardar") {
    $content = json_decode($_POST['track']);
    $id_User = $_POST['id_User'];
    include("db.php");
    $consulta = "INSERT INTO canciones(Id_Cancion,Track,Etiquetas,Id_User,Name) VALUES (null,'$content','prueba',$id_User,'prueba')";
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
