<?php
function listar($resultado)
{
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo
        '<li>
            <span class="nombre-song-top">' . $row['nombre'] . '</span>
            <span class="nombre-user-top">' . $row['username'] . '</span>
            <span class="id_song"> ' . $row['id_Cancion'] . '</span>
            <span class="cancion"> ' . $row['track'] . '</span>
            <button class="play"><i class="fas fa-play"></i></i></button></button>
            <button class="pause"><i class="fas fa-pause"></i></i></button></button>
        </li>';
    }
}
