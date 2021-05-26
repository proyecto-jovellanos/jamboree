$(document).ready(function () {
    console.clear()
    var track;
    $(".cancion").hide()
    $(".id_song").hide()

    $.getScript("../functions.js", function () {
        console.log("script cargado");
        loop()
    });

    $(".play").click(function () {
        let id = $(this).prev().prev().html()
        console.log(id);
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=borrar para controlar la operacion en php
            body: "option=masLike&id_song=" + id
        }
        fetch("../server.php", params)

        track = $(this).prev().html()
        cargaTrack(track)
        play()
    })

    $(".pause").click(function () {
        stop()
    })
})