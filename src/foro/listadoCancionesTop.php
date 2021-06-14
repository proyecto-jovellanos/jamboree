<?php
function listarTop($resultado)
{
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo
        '<li>

            <div class="data">
                <span class="autor theme">' . $row['nombre'] . '</span>
                <span class="autor name">' . $row['username'] . '</span>
            </div>
            <div class="controla">
                <div class="bpm"> ' . $row['bpm'] . '</div>
                <span class="cancion"> ' . $row['track'] . '</span>
                <span id="' . $row['id_Cancion'] . '"></span>
                <button class="play hit"><i class="fas fa-play"></i></button>
                <button class="pause hit"><i class="fas fa-pause"></i></button>
            </div>
            <span class="escuchasTop"> ' . $row['escuchas'] . ' <i class="fas fa-headphones-alt"></i></span>
            
        </li>';
    }
}
