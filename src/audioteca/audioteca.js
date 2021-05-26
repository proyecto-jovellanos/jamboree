$(document).ready(function () {
    console.clear();
    var track;
    $.getScript("../functions.js", function () {
        console.log("script cargado");
        loop()
    });

    $(".cancion").hide()

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
    $(".play").click(function (ev) {
        $(".play").click(function () {
            track = $(this).prev().html()
            cargaTrack(track)
            play()
        })
    })
    $(".pause").click(function (ev) {
        stop()
    })
})