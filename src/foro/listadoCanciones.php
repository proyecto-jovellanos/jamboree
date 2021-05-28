<?php
function listar($resultado)
{
    if ($resultado->num_rows > 0) {

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            echo
            '<article class="tema grow">
            <header class="header-tema">
            ' . $row['nombre'] . '
            </header>
            <span class="autor">' . $row['username'] . '</span> <span class="escuchas">' . $row['escuchas'] . '</span>
            <div class="id_song"> ' . $row['id_Cancion'] . '</div>
            <div class="cancion"> ' . $row['track'] . '</div>
            <button class="play"><i class="fas fa-play"></i></i></button></button>
            <button class="pause"><i class="fas fa-pause"></i></i></button></button>
            <div class="etiqueta"> ' . $row['etiquetas'] . '</div>
            <button class="edit">
            <a href="../estudio/estudio.html?id_song=' . $row['id_Cancion'] . '"><i class="fas fa-pencil-alt"></i>EDITAR EN ESTUDIO</a>
            </button>
            </article>';
        }
    } else {
        echo 'Esta etiqueta no tienen ninguna canción aún, pincha en otra o en "todas".';
    }
}
