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
            <span class="autor">Created by: ' . $row['username'] . '</span><br> <span class="escuchas">' . $row['escuchas'] . ' <i class="fas fa-headphones-alt"></i></span>
            <div class="bpm"> ' . $row['bpm'] . '</div>
            <div class="id_song"> ' . $row['id_Cancion'] . '</div>
            <div class="cancion"> ' . $row['track'] . '</div>
            <div class="etiqueta"> ' . $row['etiquetas'] . '</div>
            <button class="edit">
            <a href="../estudio/estudio.html?id_song=' . $row['id_Cancion'] . '">
                <i class="fas fa-pencil-alt"></i>
                <span class="popup">Editar esta canción en el estudio</span>
            </a>
            <button class="play"><i class="fas fa-play"></i></button>
            <button class="pause"><i class="fas fa-pause"></i></button>
            </button>
            <div class="cancion"> ' . $row['track'] . '</div>
            <canvas  width="100%" height="100%" id="' . $row['id_Cancion'] . '"></canvas>
            </article>';
        }
    } else {
        echo 'Esta etiqueta no tienen ninguna canción aún, pincha en otra o en "todas".';
    }
}
