$(document).ready(function () {
    console.clear();
    var track;
    $(".cancion").hide()
    $(".bpm").hide()
    $(".id_song").hide()

    $("canvas").each(function () {
        let id = $(this).attr("id")
        let track = JSON.parse($(this).prev().html())
        // console.log(track);
        for (let i = 0; i < 4; i++) {
            for (let j = 0; j <= 31; j++) {
                if (track[i][0][j] == 1) {
                    //console.log(track[i][0][j]);
                    draw(i, j, id)
                }
                //else
                //    console.log("JSONN");
                //console.log(track[i][0][j]);

            }
        }
    });

    function draw(i, j, id) {
        var colores = ["#6D5FF5", "#DE6262", "#F5CA5F", "#6DEB5B"]
        var canvas = document.getElementById(`${id}`)
        var ctx = canvas.getContext("2d");

        /* quiero q se dibuje la 32ª parte que corresponda
         si index es 4 que se dibuja la 4 linea de 32. 
        beatwidth es el ancho del canvas / cada hueco de los beats */
        let beatWidth = canvas.width / 32
        let x = beatWidth * j

        /* quiero q se dibuje la track que corresponda
         si i es 1 que se dibuja la barra de snare. 
        beatwidth es el ancho del canvas / cada hueco de los beats */
        ctx.fillStyle = colores[i];
        ctx.fillRect(x, canvas.height / 2, beatWidth, canvas.height / 2);
    }

    $.getScript("../functions.js", function () {
        console.log("script cargado");
        loop()
    });

    $(".play").click(function (ev) {
        track = $(this).prev().html()
        let bpm = $(this).prev().prev().html()
        console.log(bpm);
        cargaTrack(track, bpm)

        let id = $(this).next().html()
        console.log(id);
        play(id)
    })

    $(".pause").click(function (ev) {
        stop()
    })

    //boton para borrar
    $(".fa-trash-alt").click(function () {
        let id = $(this).attr("id")
        console.log(id);
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=borrar para controlar la operacion en php
            body: "option=borrar&id_song=" + id
        }
        fetch("../server.php", params)

        $(this).parent().parent().hide()
    })
    $(".toForo").click(function (ev) {
        ev.preventDefault()
        let id = $(this).prev().contents().attr("id")
        console.log(id);
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=makePublic para cambiar privacidad en php
            body: "option=makePublic&id_song=" + id
        }
        fetch("../server.php", params)
        $(this).hide()
    })
    $(".fromForo").click(function (ev) {
        ev.preventDefault()
        let id = $(this).prev().contents().attr("id")
        console.log(id);
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=makePublic para cambiar privacidad en php
            body: "option=makePrivated&id_song=" + id
        }
        fetch("../server.php", params)
        $(this).hide()
    })
})