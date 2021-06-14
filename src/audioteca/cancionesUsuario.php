<?php
function listar($resultado)
{
    if ($resultado->num_rows > 0) {
        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            echo
            '<article class="tema grow">
        <div class="left-theme">
            <header class="header-tema">
                ' . $row['nombre'] . '
            </header>
            <span>' . $row['fecha'] . '</span>
    
            <div class="controles">
                <div class="id_song"> ' . $row['id_Cancion'] . '</div>
                <button class="icono"><i class="far fa-trash-alt"></i></button>
                ';

            if ($row['publica'] == '0') {
                echo '<button class="btn toForo"><i class="fas fa-upload">
            </i>
            <span class="popup">Subir track a foro</span>
            </button>';
            } else {
                echo '<button class="btn fromForo"><i class="fas fa-download">
            </i>
            <span class="popup">Quitar track del foro</span>
            </button>';
            }
            echo
            '<button class="btn">
                    <a href="../estudio/estudio.html?id_song=' . $row['id_Cancion'] . '">
                        <i class="fas fa-pencil-alt">
                        <span class="popup">Editar esta canción en el estudio</span>
                        </i>
                    </a>
                </button>
                <div class="bpm"> ' . $row['bpm'] . '</div>
                <div class="cancion"> ' . $row['track'] . '</div>
                <button class="btn play"><i class="fas fa-play"></i></button>
                <div class="id_song"> ' . $row['id_Cancion'] . '</div>
                <button class="btn pause"><i class="fas fa-pause"></i></button>
            </div>
        </div>
    
        <div class="right-theme">
            <div class="cancion"> ' . $row['track'] . '</div>
            <canvas id="' . $row['id_Cancion'] . '"></canvas>
        </div>
    
    </article>';
        }
    } else {
        echo '<div class="empty">Aún no tienes ningún tema guardado, crea uno en tu <a href="../estudio/estudio.html">estudio</a>.</div>';
    }
}
