$(document).ready(function () {
    $(".fa-trash-alt").click(function () {
        let id = $(this).attr("id")
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
})