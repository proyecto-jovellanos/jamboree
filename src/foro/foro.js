$(document).ready(function () {
    console.clear()
    var id;
    var bpm;
    var track;

    $(".cancion").hide()
    $(".id_song").hide()
    $(".bpm").hide()

    $("canvas").each(function () {
        let id = $(this).attr("id")
        let track = JSON.parse($(this).prev().html())
        for (let i = 0; i < 4; i++) {
            for (let j = 0; j <= 31; j++) {
                if (track[i][0][j] == 1) {
                    draw(i, j, id)
                }
            }
        }
    })
    $('canvas').click(function () {
        let id = $(this).attr("id")
        window.location.replace("../estudio/estudio.html?id_song=" + id);
    });

    //@param i=0,1,2,3 ; j= 0-31 
    function draw(i, j, id) {
        //var colores = ["#6D5FF5", "#DE6262", "#F5CA5F", "#6DEB5B"]
        var colores = ["#412166", "#5504B3", "#6E05E6", "#954BEA"]
        var canvas = document.getElementById(`${id}`)
        var ctx = canvas.getContext("2d");

        /* quiero q se dibuje la 32ª parte que corresponda
         si index es 4 que se dibuja la 4 linea de 32. 
        beatwidth es el ancho del canvas / cada hueco de los beats */
        let beatWidth = canvas.width / 32
        let x = beatWidth * j
        let beatHeight = canvas.height / 4
        //let y = beatHeight * i+canvas.height
        let y = (beatHeight * i)

        /* quiero q se dibuje la track que corresponda
         si i es 1 que se dibuja la barra de snare. 
        beatwidth es el ancho del canvas / cada hueco de los beats */
        ctx.fillStyle = colores[i];
        ctx.fillRect(x, y, beatWidth, canvas.height);
    }


    $.getScript("../functions.js", function () {
        console.log("script cargado");
        loop()
    });

    $(".play").click(function () {
        if ($(this).hasClass("lista")) {
            id = $(this).next().html()
            track = $(this).next().next().html()
            bpm = $(this).prev().html()
        } else {
            id = $(this).prev().attr("id")
            track = $(this).prev().prev().html()
            bpm = $(this).prev().prev().prev().html()
        }

        $("canvas").each(function () {
            let id = $(this).attr("id")
            let track = JSON.parse($(this).prev().html())
            for (let i = 0; i < 4; i++) {
                for (let j = 0; j <= 31; j++) {
                    if (track[i][0][j] == 1) {
                        draw(i, j, id)
                    }
                }
            }
        });

        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=maslike para sumar una escucha al track en php
            body: "option=masLike&id_song=" + id
        }
        fetch("../server.php", params)
        //  .then(response => response.text())
        //  .then(data => console.log(data));
        cargaTrack(track, bpm)
        play(id)
    })

    $(".pause").click(function () {
        $("canvas").each(function () {
            let id = $(this).attr("id")
            let track = JSON.parse($(this).prev().html())
            for (let i = 0; i < 4; i++) {
                for (let j = 0; j <= 31; j++) {
                    if (track[i][0][j] == 1) {
                        draw(i, j, id)
                    }
                }
            }
        });
        stop()
    })

    //al pulsar cualquiera de las etiquetas se borra el contenido del section y se rellena con las canciones con la etiqueta elegida
    /*  $(".tags>div").click(function (ev) {
        FUNCA AL MOSTRAR ESAS CANCIONES, PERO AL NO RECARGAR HTML NO FUNCIONA EL PLAY NI LOS HIDE NI NA
         ev.preventDefault()
         $(".noticias").html("data")
         let etiqueta = $(this).attr("class")

         var params = {
             method: 'POST',
             headers: {
                 'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
             },
             //option=borrar para controlar la operacion en php
             body: "option=filtrarTag&etiqueta=" + etiqueta
         }
         fetch("../server.php", params)
             .then(response => response.text())
             .then(function (data) {
                 $(".noticias").html(data)
             });
     }) */
})