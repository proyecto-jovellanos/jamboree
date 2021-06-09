$(document).ready(function () {
    console.clear()
    var track;
    $(".cancion").hide()
    $(".id_song").hide()
    $(".bpm").hide()

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
        console.log(canvas);
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

    $(".play").click(function () {
        let id = $(this).next().next().next().attr("id")

        //console.log(id);
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
        track = $(this).next().next().html()
        let bpm = $(this).prev().html()
        // console.log(bpm);
        cargaTrack(track, bpm)
        play(id)
    })

    $(".pause").click(function () {
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