$(document).ready(function () {
    if (Tone.context.state !== 'running') {
        Tone.context.resume();
    } else {
        Tone.Transport.start()
    }

    console.clear()

    let track = {
        // "name": nombreCookie,
        //   "track": {
        "kick": Array(32).fill(0),
        "snare": Array(32).fill(0),
        "hat": Array(32).fill(0),
        "clap": Array(32).fill(0)
        //    },
        //"etiquetas": etiquetas
    };

    $(".fa-play").click(function (ev) {
        ev.preventDefault()
        if (Tone.context.state !== 'running') {
            Tone.context.resume();
        } else {
            Tone.Transport.start()
        }
        play()
        //Tone.start()
    })

    $(".fa-stop").click(function (ev) {
        ev.preventDefault()
        Tone.Transport.pause()

    })
    $(".fa-save").click(function (ev) {
        ev.preventDefault()
        //    fetch(json, header = "guardar", idUser)

    })

    /* evento a cada beat para pulsarlo */
    $(".beat").click(function (ev) {
        ev.preventDefault()
        $(this).toggleClass("marked")
        leerMarked()
    })

    //Funcion lectora de todos los beats para crear objeto track
    function leerMarked() {
        for (const pista in track) {
            for (let i = 1; i < 33; i++) {
                $(`.${pista}>.beat.${i}`).hasClass("marked") ?
                    track[pista][i - 1] = 1 : track[pista][i - 1] = 0
            }
        }
        // console.log(track);
    }

    //////////////////////////


    console.log(Tone.context.lookAhead); //=0.1

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

    function play() {
     /*    if (Tone.context.state !== 'running') {
            Tone.context.resume();
        }
        Tone.setContext(new Tone.Context({
            latencyHint: "playback"
        })) */

        //get del buffer los sonidos
        let k = baseSeq.get("kick");
        let h = baseSeq.get("hat");
        let s = baseSeq.get("snare");
        let c = baseSeq.get("clap");

        //crear player por cada sonido
        const kick = new Tone.Player().toDestination();
        const hat = new Tone.Player().toDestination();
        const snare = new Tone.Player().toDestination();
        const clap = new Tone.Player().toDestination();

        //cargamos en cada player su sonido
        kick.buffer = k
        hat.buffer = h
        snare.buffer = s
        clap.buffer = c

        // loaded para asegurar que se carguen en bufer todos los sonidos
        //Tone.loaded().then(() => {
        Tone.Transport.scheduleRepeat(repite, '2m')
        //Tone.Transport.start()
        let index = 0

        function repite(time) {
            for (const pista in track) {
                for (let i = 1; i < 33; i++) {
                    // console.log(pista);
                    if ($(`.${pista}>.beat.${i}`).hasClass("marked"))
                        switch (pista) {
                            case "kick":
                                kick.start("+0.5")
                                break;
                            case "snare":
                                snare.start("+0.5")
                                break;
                            case "clap":
                                clap.start("+0.5")
                                break;
                            case "hat":
                                hat.start("+0.5")
                                break;

                            default:
                                console.log("error");
                                break;
                        }
                }
            }
            index == 32 ? index = 0 : index++
        }
        index++
    }
})

/* for (let i = 0; i < 4; i++) {
    hat.start()
    kick.start()
} */
//en teoria con draw mejor para poner visualizacion
/* Tone.Draw.schedule(function () {
    console.log("dentro" + context.state);
    //play sound and images here
}, time) */