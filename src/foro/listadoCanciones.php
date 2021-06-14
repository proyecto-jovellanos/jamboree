<?php
function listar($resultado)
{
    if ($resultado->num_rows > 0) {

        while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
            echo
            '<article class="tema grow">

                <div class="left-theme">
            
                    <div class="auth-theme">
                        <header class="header-tema">
                            ' . $row['nombre'] . '
                        </header>
                        <div class="autor">' . $row['username'] . '</div>
                    </div>
                    
                    
                    <div class="controles">
                        <button class="edit">
                        <a href="../estudio/estudio.html?id_song=' . $row['id_Cancion'] . '">
                                <i class="fas fa-pencil-alt"> 
                                <span class="popup">Editar esta canción en el estudio</span>
                                </i>
                                </a>
                                </button>
                                <div class="bpm"> ' . $row['bpm'] . '</div>
                                <button class="play lista">
                            <i class="fas fa-play"></i>
                            </button>
                        <div class="id_song">' . $row['id_Cancion'] . '</div>
                        <div class="cancion"> ' . $row['track'] . '</div>
                        <button class="pause">
                        <i class="fas fa-pause"></i>
                        </button>
                    </div>
                </div>
                
                <div class="right-theme">
                    <div class="cancion"> ' . $row['track'] . '</div>
                    <canvas id="' . $row['id_Cancion'] . '"></canvas>

                    <div class="tag-likes">
                        <div class="escuchas"> 
                            <i class="fas fa-headphones-alt"><span>' . $row['escuchas'] . '</span></i>
                        </div>
                        <div class="etiqueta"> ' . $row['etiquetas'] . '</div>
                    </div>
                </div>
            </article>';
        }
    } else {
        echo '<div class="empty">No existen temas en este apartado, crea uno en tu <a href="../estudio/estudio.html">estudio</a>.</div>';
    }
}
