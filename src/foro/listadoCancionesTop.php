<?php
function listarTop($resultado)
{
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo
        '<li>
            <span class="nombre-song-top">' . $row['nombre'] . '</span> by 
            <span class="nombre-user-top">' . $row['username'] . '</span>
            <div class="bpm"> ' . $row['bpm'] . '</div>
            <span class="id_song"> ' . $row['id_Cancion'] . '</span>
            <span class="cancion"> ' . $row['track'] . '</span>
            <button class="play hit"><i class="fas fa-play"></i></button>
            <button class="pause hit"><i class="fas fa-pause"></i></button><br><br>
            <span class="escuchasTop"> ' . $row['escuchas'] . ' <i class="fas fa-headphones-alt"></i></span>

        </li>';
    }
}