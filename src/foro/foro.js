$(document).ready(function () {
    console.clear()
    var track;
    $(".cancion").hide()
    $(".id_song").hide()
    $(".bpm").hide()

    $.getScript("../functions.js", function () {
        console.log("script cargado");
        loop()
    });

    $(".play").click(function () {
        let id = $(this).prev().prev().html()
      //  console.log(id);
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=maslike para sumar una escucha al track en php
            body: "option=masLike&id_song=" + id
        }
        fetch("../server.php", params)
            .then(response => response.text())
            .then(data => console.log(data));
        track = $(this).prev().html()
        let bpm = $(this).prev().prev().prev().html()
       // console.log(bpm);
        cargaTrack(track, bpm)
        play()
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