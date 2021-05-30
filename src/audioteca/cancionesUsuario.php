<?php
function listar($resultado)
{
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo
        '<article class="tema grow">
        <header class="header-tema">
        ' . $row['nombre'] . '
        </header>
        <button class="icono"><i id=' . $row['id_Cancion'] . ' class="far fa-trash-alt"></i></button>
        ';

        if ($row['publica'] == '0') {
            echo '<button class="btn toForo">Subir a Foro</button>';
        } else {
            echo '<button class="btn fromForo">Quitar del Foro</button>';
        }

        echo
        '<button class="btn">
            <a href="../estudio/estudio.html?id_song=' . $row['id_Cancion'] . '"><i class="fas fa-pencil-alt"></i></a>
        </button>
            <div class="cancion"> ' . $row['track'] . '</div>
        <button class="btn play"><i class="fas fa-play"></i></button>
        <button class="btn pause"><i class="fas fa-pause"></i></button>
    </article>';
    }
}