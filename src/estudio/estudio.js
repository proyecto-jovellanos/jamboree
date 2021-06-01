$(document).ready(function () {
    //regex para rescatar el valor de la cookie id_User
    let user = document.cookie.replace(/(?:(?:^|.*;\s*)id_User\s*\=\s*([^;]*).*$)|^.*$/, "$1");

    if (user == "") {
        alert("Tu sesión expiró, vuelve a iniciar sesión.")
        window.location.href = "../index/index.php"
    }

    if (Tone.context.state !== 'running') {
        Tone.context.resume();
    } else {
        Tone.Transport.start()
    }

    console.clear()
    //console.log(navigator.mediaDevices.getUserMedia)
    //  var user = document.cookie.replace(/(?:(?:^|.*;\s*)id_User\s*\=\s*([^;]*).*$)|^.*$/, "$1");
    console.log(user);

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

    $("#tempo").on('change', function (ev) {
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
                console.log("playing");
            }
        } else if (($(this).hasClass("fa-pause"))) {
            $(this).addClass("fa-play").removeClass("fa-pause")
            Tone.Transport.pause()
            console.log("pausado");
        }
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
        let empty = true
        $(".beat").each(function () {
            if ($(this).hasClass("marked")) {
                empty = false
            }
        })
        if (empty) {
            alert("No puedes guardar una canción vacía")
        } else {
            $(".form-popup").show()
        }
    })

    $(".save").click(function (ev) {
        ev.preventDefault()
        let song_name = $('input[name="name"]').val()
        if (song_name == "") {
            $(".warning").text("Introduce un nombre!")
        } else {
            let tracksJSON = JSON.stringify(tracks)
            let tag = $("select").children("option:selected").val()
            let bpm = $("#tempo").val()
            console.log(bpm);
            var params = {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
                },
                //option=guardar para controlar la operacion en php
                body: "option=guardar&id_User=" + user + "&track=" + tracksJSON +
                    "&song_name=" + song_name + "&tag=" + tag + "&bpm=" + bpm
            }
            fetch("../server.php", params)

            $(".warning").text("Canción guardada en tu audioteca!")
            setTimeout(() => {
                $(".form-popup").hide()
            }, 2000);
        }

    })

    $(".fa-eraser").click(function (ev) {
        ev.preventDefault()
        for (let i = 0; i < tracks.length; i++) {
            tracks[i].fill(0)
        }
        $(".beat").removeClass("marked")
        Tone.Transport.stop()
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
                $(`.${tracks[i][1]} .beats .beat.${j}`).hasClass("marked") ?
                    tracks[i][0][j - 1] = 1 :
                    tracks[i][0][j - 1] = 0
            }
        }
        console.log(tracks);
    }

    function leerTrackJSON() {
        for (let i = 0; i < 4; i++) {
            for (let j = 1; j < 33; j++) {
                if (tracks[i][0][j - 1] == 1) {
                    $(`.${tracks[i][1]} .beats .beat.${j}`).addClass("marked")
                } else {
                    console.log(tracks[i][0][j - 1]);
                    // console.log("0");
                }
            }
        }
    }

    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('id_song')) {
        var id_song = urlParams.get("id_song")
        console.log(id_song);
        //get json track from db
        getTrack()
        getBPM()
    } else console.log("No precargar");

    function getTrack() {
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=get para controlar la operacion en php
            body: "option=get&id_song=" + id_song
        }
        fetch("../server.php", params)
            .then(function (respuesta) {
                return respuesta.text()
            }).then(function (datos) {
                // console.log(datos);
                let obj = JSON.parse(datos)
                for (let i = 0; i < 4; i++) {
                    tracks[i][0] = obj[i][0]
                }
                leerTrackJSON()
            })
    }

    function getBPM() {
        var params = {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded;charset=UTF-8'
            },
            //option=get para controlar la operacion en php
            body: "option=getBPM&id_song=" + id_song
        }
        fetch("../server.php", params)
            .then(function (respuesta) {
                return respuesta.text()
            }).then(function (datos) {
                // console.log(datos);
                $('#tempo').attr("value", datos)
                Tone.Transport.bpm.value = datos
            })
    }

    ////////////// AUDIO ////////////

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

    Tone.Transport.scheduleRepeat(function (time) {
        Tone.Draw.schedule(function () {
            for (let i = 0; i < 4; i++) {
                if (index == 32) {
                    $(`.${tracks[i][1]} .beats .beat.${index}`).addClass("timeline")
                } else if (index == 0) {
                    $(`.${tracks[i][1]} .beats .beat.32`).removeClass("timeline")
                    $(`.${tracks[i][1]} .beats .beat.${index+1}`).toggleClass("timeline")
                } else {
                    $(`.${tracks[i][1]} .beats .beat.${index+1}`).toggleClass("timeline")
                    $(`.${tracks[i][1]} .beats .beat.${index}`).toggleClass("timeline")
                }
                //  console.log(index);
                let player = players[i]
                if (tracks[i][0][index] == 1) {
                    //  console.log("index :" + index);
                    player.start("+0.1")
                    //  console.log(Tone.Transport.sampleTime);
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

    /////////////////VISUALS///////////////
    $(".fullpage-help").hide()

    $(".fa-question").click(function (ev) {
        ev.preventDefault()
        $(".fullpage-help").show()
    })
    $(".fullpage-help").click(function (ev) {
        ev.preventDefault()
        $(".fullpage-help").hide()
    })

    //para que la letra no sea menos de 10px, no puedo controlarlo en css
    /* $("*").each(function () {
        var $this = $(this);
        if (parseInt($this.css("font-size")) < 12) {
            $this.css({
                "font-size": "12px"
            });
        }
    }); */
    /*   let stream = players[0].context.createMediaStreamSource()
    let wave = new Wave();
    console.log(stream);
    wave.fromStream(stream, "canvas", {
        type: "shine",
        colors: ["red", "white", "blue"]
    })
 */
})