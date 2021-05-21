<?php
function listar($resultado){
    while ($row = mysqli_fetch_array($resultado, MYSQLI_ASSOC)) {
        echo
        '<article class="tema grow">
            <header class="header-tema">
            ' . $row['Id_Cancion'] .'
                </header>
                <span class="autor">' . $row['Id_User'].'</span> <span>200.000</span>
                <div class="cancion"> ' . $row['Track'].'</div>
                <button class="play"><i class="fas fa-play"></i></i></button></button>
                <button class="edit">
                    <a href="../estudio/estudio.html"><i class="fas fa-pencil-alt"></i>EDITAR EN ESTUDIO</a>
                </button>
            </article>';
    }
}
?>