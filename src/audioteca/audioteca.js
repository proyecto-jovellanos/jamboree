$(document).ready(function () {
    console.clear();
    var track;
    $(".cancion").hide()
    $(".bpm").hide()
    $(".id_song").hide()

    //al pinchar en canvas redirigirá al etudio cno esa canción cargada
    $('canvas').click(function () {
        let id = $(this).attr("id")
        window.location.replace("../estudio/estudio.html?id_song=" + id);
    });

    $("canvas").each(function () {
        let id = $(this).attr("id")
        let track = JSON.parse($(this).prev().html())
        console.log(track);
        for (let i = 0; i < 4; i++) {
            for (let j = 0; j <= 31; j++) {
                if (track[i][0][j] == 1) {
                    draw(i, j, id)
                }
            }
        }
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
         si i es 1 que se dibuje la barra de snare. 
        beatwidth es el ancho del canvas / cada hueco de los beats */
        ctx.fillStyle = colores[i];
        ctx.fillRect(x, y, beatWidth, canvas.height);
    }

    $.getScript("../functions.js", function () {
        console.log("script cargado");
        loop()
    });

    $(".play").click(function (ev) {
        track = $(this).prev().html()
        let bpm = $(this).prev().prev().html()
        cargaTrack(track, bpm)

        let id = $(this).next().html()
        $("canvas").each(function () {
            for (let i = 0; i < 4; i++) {
                for (let j = 0; j <= 31; j++) {
                    if (track[i][0][j] == 1) {
                        draw(i, j, id)
                    }
                }
            }
        });

        play(id)
    })

    $(".pause").click(function (ev) {
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

    //boton para borrar
    $(".fa-trash-alt").click(function () {
        var userselection = confirm("¿Estás seguro de borrar este tema permanentemente?");

        if (userselection == true) {
            let id = $(this).parent().prev().html()
            var params = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                },
                //option=borrar para controlar la operacion en php
                body: "option=borrar&id_song=" + id
            }
            fetch("../server.php", params)


            alert("Tema eliminado!");

            $(this).parent().parent().parent().parent().hide()
        } else {

            alert("Tema no eliminado");

        }
    })
    $(".toForo").click(function (ev) {
        ev.preventDefault()
        let id = $(this).prev().prev().html()
        // console.log(id);
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=makePublic para cambiar privacidad en php
            body: "option=makePublic&id_song=" + id
        }
        fetch("../server.php", params)
        //$(this).hide()
        $(this).html('<button class="btn fromForo"><i class="fas fa-download"></i><span class= "popup" >Quitar track del foro</span></button>')
    })
    $(".fromForo").click(function (ev) {
        ev.preventDefault()
        let id = $(this).prev().prev().html()
        // console.log(id);
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=makePublic para cambiar privacidad en php
            body: "option=makePrivated&id_song=" + id
        }
        fetch("../server.php", params)
        //$(this).hide()
        $(this).html('<button class="btn toForo"><i class="fas fa-upload"></i><span class= "popup" >Subir track a foro</span></button>')
    })
})