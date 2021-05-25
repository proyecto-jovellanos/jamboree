$(document).ready(function () {
    if (Tone.context.state !== 'running') {
        Tone.context.resume();
    } else {
        Tone.Transport.start()
    }

    console.clear()
    var sonando = false

    var tracks = {
        // "name": nombreCookie,
        //   "track": {
        0: [Array(32).fill(0), "kick"],
        1: [Array(32).fill(0), "snare"],
        2: [Array(32).fill(0), "hat"],
        3: [Array(32).fill(0), "clap"]
        //    },
        //"etiquetas": etiquetas
    };

    $("#tempo").on('input', function (ev) {
        ev.preventDefault()
        let tiempo = this.value;
        console.log(tiempo);
        Tone.Transport.bpm.value = tiempo
    })

    $(".onoff").click(function (ev) {
        ev.preventDefault()
        if ($(this).hasClass("fa-play")) {
            $(this).removeClass("fa-play").addClass("fa-pause")
            if (Tone.context.state !== 'running') {
                Tone.context.resume();
            } else {
                Tone.Transport.start()
            }
        } else if (($(this).hasClass("fa-pause"))) {
            $(this).addClass("fa-play").removeClass("fa-pause")
            Tone.Transport.pause()
        }
        /* if (!sonando) {
            play()
        } else {
            Tone.Transport.pause()
        } */
    })

    /*   $(".fa-pause").click(function (ev) {
          console.log("pausaa");
          ev.preventDefault()
          $(this).toggleClass("fa-pause", false).toggleClass("fa-play")
          Tone.Transport.stop()
          //sonando = false
      }) */

    //boton guardar envia por fetch el array de la cancion y el idUser
    $(".close").click(function (ev) {
        ev.preventDefault()
        $(".form-popup").hide()

    })

    $(".fa-save").click(function (ev) {
        ev.preventDefault()
        $(".form-popup").show()
    })
    $(".save").click(function (ev) {
        ev.preventDefault()
        let song_name = $('input[name="name"]').val()
        if (song_name == "") {
            $(".warning").text("Introduce un nombre!")
        } else {
            $(".warning").text("Canción guardada en tu audioteca!")
            setTimeout(() => {
                $(".form-popup").hide()
            }, 2000);
        }
        //regex para rescatar el valor de la cookie id_User
        let user = document.cookie.replace(/(?:(?:^|.*;\s*)id_User\s*\=\s*([^;]*).*$)|^.*$/, "$1");
        let tracksJSON = JSON.stringify(tracks)
        let tag = $("select").children("option:selected").val();
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=guardar para controlar la operacion en php
            body: "option=guardar&id_User=" + user + "&track=" + tracksJSON +
                "&song_name=" + song_name + "&tag=" + tag
        }
        fetch("../server.php", params)
    })

    $(".fa-eraser").click(function (ev) {
        ev.preventDefault()
        for (let i = 0; i < tracks.length; i++) {
            tracks[i].fill(0)
        }
        $(".beat").removeClass("marked")
    })

    /* evento a cada beat para pulsarlo */
    $(".beat").click(function (ev) {
        ev.preventDefault()
        $(this).toggleClass("marked")
        leerMarked()
    })

    //boton para mutear una pista
    $(".fa-volume-mute").click(function (ev) {
        ev.preventDefault()
        let instrumento = $(this).parent().parent().attr("class").split(" ")[1];
        switch (instrumento) {
            case "kick":
                if (players[0].mute) {
                    players[0].mute = false
                    $(this).css("color", "black")
                } else {
                    players[0].mute = true
                    $(this).css("color", "red")
                }
                break;
            case "snare":
                if (players[1].mute) {
                    players[1].mute = false
                    $(this).css("color", "black")
                } else {
                    players[1].mute = true
                    $(this).css("color", "red")
                }
                break;
            case "hat":
                if (players[2].mute) {
                    players[2].mute = false
                    $(this).css("color", "black")
                } else {
                    players[2].mute = true
                    $(this).css("color", "red")
                }
                break;
            case "clap":
                if (players[3].mute) {
                    players[3].mute = false
                    $(this).css("color", "black")
                } else {
                    players[3].mute = true
                    $(this).css("color", "red")
                }
                break;

            default:
                break;
        }
    })

    //Funcion lectora de todos los beats para crear objeto track
    function leerMarked() {
        for (let i = 0; i < 4; i++) {
            for (let j = 1; j < 33; j++) {
                $(`.${tracks[i][1]}>.beat.${j}`).hasClass("marked") ?
                    tracks[i][0][j - 1] = 1 : tracks[i][0][j - 1] = 0
            }
        }
        //  console.log(JSON.stringify(tracks));
    }

    //////////////////////////


    //console.log(Tone.context.lookAhead); //=0.1

    const baseSeq = new Tone.ToneAudioBuffers({
        urls: {
            kick: "/Kicks/Kick 01.wav",
            hat: "/Hats/Hat 01.wav",
            snare: "/Snares/Snare (1).wav",
            clap: "/Claps/Clap 01.wav",
        },
        //autostart: true,
        baseUrl: "../../media",
    })

    //get del buffer los sonidos
    let k = baseSeq.get("kick");
    let h = baseSeq.get("hat");
    let s = baseSeq.get("snare");
    let c = baseSeq.get("clap");

    //crear player por cada sonido
    const players = [
        new Tone.Player(),
        new Tone.Player(),
        new Tone.Player(),
        new Tone.Player()
    ]

    players.forEach(player => player.toDestination())

    //cargamos en cada player su sonido
    players[0].buffer = k
    players[1].buffer = s
    players[2].buffer = h
    players[3].buffer = c

    // loaded para asegurar que se carguen en bufer todos los sonidos
    //Tone.loaded().then(() => {

    var index = 0

    //function play() {
    //sonando = true
    Tone.Transport.scheduleRepeat(function (time) {
        Tone.Draw.schedule(function () {
            for (let i = 0; i < 4; i++) {
                //  console.log(index);
                let player = players[i]
                if (tracks[i][0][index] == 1) {
                    //  console.log("index :" + index);
                    player.start("+0.9")
                    //  console.log(Tone.Transport.sampleTime);
                } else {
                    // console.log(index, Tone.Transport.toTicks());
                    //   console.log("NADA" + index);
                }
            }
            if (index < 31) {
                index++
            } else {
                index = 0
            }
        }, time)
    }, "32n");
    //Tone.Transport.start()
    //}
})