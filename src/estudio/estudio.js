$(document).ready(function () {

    console.clear()

    let track = {
        "kick": [],
        "snare": [],
        "hihat": [],
        "clap": []
    };

    $(".fa-play").click(function (ev) {
        ev.preventDefault()
        play()
        //Tone.start()
    })

    $(".fa-stop").click(function (ev) {
        ev.preventDefault()
        Tone.Transport.pause()

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

    if (Tone.context.state !== 'running') {
        Tone.context.resume();
    }

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
        Tone.setContext(new Tone.Context({
            latencyHint: "playback"
        }))

        //get del buffer los sonidos
        let k = baseSeq.get("kick");
        let h = baseSeq.get("hat");
        let s = baseSeq.get("snare");
        let c = baseSeq.get("clap");

        //crear player por cada sonido
        const playK = new Tone.Player().toDestination();
        const playH = new Tone.Player().toDestination();
        const playS = new Tone.Player().toDestination();
        const playC = new Tone.Player().toDestination();

        //cargamos en cada player su sonido
        playK.buffer = k
        playH.buffer = h
        playS.buffer = s
        playC.buffer = c

        // loaded para asegurar que se carguen en bufer todos los sonidos
        //Tone.loaded().then(() => {
        Tone.Transport.scheduleRepeat(repite, '8n')
        Tone.Transport.start()
        let index = 0

        function repite(time) {
            //de 0 a fin de compás, sea 8 o 32...
            let negra = index % 32
            for (const sound in track) {
                let inTrack = track[sound]
                console.log(inTrack);
            }
        }
        index++
    }
})

/* for (let i = 0; i < 4; i++) {
    playH.start()
    playK.start()
} */
//en teoria con draw mejor para poner visualizacion
/* Tone.Draw.schedule(function () {
    console.log("dentro" + context.state);
    //play sound and images here
}, time) */