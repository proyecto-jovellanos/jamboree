<?php
function listar($resultado){
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo
        '<article class="tema grow">
        <header class="header-tema">
        ' . $row['Id_Cancion'] .'
        </header>
        <button class="icono"><i class="far fa-trash-alt"></i></button>
        <button class="btn"><a href="../estudio/estudio.html">Editar</a></button>
        <button class="btn">Reproducir</button>
        <button class="btn">Subir a Foro</button>
    </article>';
    }
}
?>