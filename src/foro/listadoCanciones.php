<?php
function listar($resultado)
{
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo
        '<article class="tema grow">
            <header class="header-tema">
            ' . $row['nombre'] . '
                </header>
                <span class="autor">' . $row['username'] . '</span> <span>200.000</span>
                <div class="id_song"> ' . $row['id_Cancion'] . '</div>
                <div class="cancion"> ' . $row['track'] . '</div>
                <button class="play"><i class="fas fa-play"></i></i></button></button>
                <button class="pause"><i class="fas fa-pause"></i></i></button></button>
                <button class="edit">
                    <a href="../estudio/estudio.html?id_song=' . $row['id_Cancion'] . '"><i class="fas fa-pencil-alt"></i>EDITAR EN ESTUDIO</a>
                </button>
            </article>';
    }
}
