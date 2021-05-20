$(document).ready(function () {
    if (Tone.context.state !== 'running') {
        Tone.context.resume();
    } else {
        Tone.Transport.start()
    }

    console.clear()

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
        for (let i = 0; i < 4; i++) {
            for (let j = 1; j < 33; j++) {
                $(`.${tracks[i][1]}>.beat.${j}`).hasClass("marked") ?
                    tracks[i][0][j - 1] = 1 : tracks[i][0][j - 1] = 0
            }
        }
        console.log(tracks);
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

    function play() {
        let index = 0
        Tone.Transport.scheduleRepeat(function (time) {
            for (let i = 0; i < 4; i++) {
                console.log(index);
                let player = players[i]
                if (tracks[i][0][index] == 1) {
                    console.log("index :" + index);
                    player.start()
                } else {
                   //   console.log("NADA" + index);
                }
                index == 32 ? index = 0 : index++
            }
        }, "32n");
        Tone.Transport.start()

        /*      function repite(time) {
            for (const pista in track) {
                for (let i = 1; i < 33; i++) {
                    console.log(`pista es ${pista} y el beat es ${i}`);
                         // console.log(pista);
                         if ($(`.${pista}>.beat.${i}`).hasClass("marked"))
                             switch (pista) {
                                 case "kick":
                                     kick.start(time)
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
             } */
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
// Juste quelques tests à partir des docs du site Tone.js ! https://tonejs.github.io/

// PIANO SAMPLER
/* const sampler = new Tone.Sampler({
    urls: {
        A0: "A0.mp3",
        C1: "C1.mp3",
        "D#1": "Ds1.mp3",
        "F#1": "Fs1.mp3",
        A1: "A1.mp3",
        C2: "C2.mp3",
        "D#2": "Ds2.mp3",
        "F#2": "Fs2.mp3",
        A2: "A2.mp3",
        C3: "C3.mp3",
        "D#3": "Ds3.mp3",
        "F#3": "Fs3.mp3",
        A3: "A3.mp3",
        C4: "C4.mp3",
        "D#4": "Ds4.mp3",
        "F#4": "Fs4.mp3",
        A4: "A4.mp3",
        C5: "C5.mp3",
        "D#5": "Ds5.mp3",
        "F#5": "Fs5.mp3",
        A5: "A5.mp3",
        C6: "C6.mp3",
        "D#6": "Ds6.mp3",
        "F#6": "Fs6.mp3",
        A6: "A6.mp3",
        C7: "C7.mp3",
        "D#7": "Ds7.mp3",
        "F#7": "Fs7.mp3",
        A7: "A7.mp3",
        C8: "C8.mp3"
    },

    // Cela règle la durée de permanence des notes jouées
    release: 10,

    // Source locale des sons
    // baseUrl: "./audio/salamander/"

    baseUrl: "https://tonejs.github.io/audio/salamander/"
}).toDestination();

piano({
    parent: document.querySelector("#content"),
    noteon: note => sampler.triggerAttack(note.name),
    noteoff: note => sampler.triggerRelease(note.name),

});

// Pour ajouter des effets...
// Exemples..
// const filter = new Tone.AutoFilter(4).start();
// const distortion = new Tone.Distortion(0.5);

const reverb = new Tone.Reverb(10);

// connect the player to the filter, distortion and then to the master output
// sampler.chain(filter, distortion, reverb, Tone.Destination);

sampler.chain(reverb, Tone.Destination);

// SEQUENCEUR
const keys = new Tone.Players({
    urls: {
        0: "A1.mp3",
        1: "Fs5.mp3",
        2: "C7.mp3",
        3: "A6.mp3",
    },
    fadeOut: "64n",

    // Source des sons du séquenceur
    baseUrl: "https://tonejs.github.io/audio/salamander/"
}).toDestination();

document.querySelector("tone-play-toggle").addEventListener("start", () => Tone.Transport.start());
document.querySelector("tone-play-toggle").addEventListener("stop", () => Tone.Transport.stop());
document.querySelector("tone-slider").addEventListener("input", (e) => Tone.Transport.bpm.value = parseFloat(e.target.value));
document.querySelector("tone-step-sequencer").addEventListener("trigger", ({
    detail
}) => {
    keys.player(detail.row).start(detail.time, 0, "16t");
}); */