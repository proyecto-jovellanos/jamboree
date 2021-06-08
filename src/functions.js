var tracks = {
    0: [Array(32).fill(0), "kick"],
    1: [Array(32).fill(0), "snare"],
    2: [Array(32).fill(0), "hat"],
    3: [Array(32).fill(0), "clap"]
};

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


function cargaTrack(t, bpm) {
    let obj = JSON.parse(t)
    for (let i = 0; i < 4; i++) {
        tracks[i][0] = obj[i][0]
    }
    $("#tempo").attr("value", bpm)
    Tone.Transport.bpm.value = bpm
    console.log("Track cargado");
}

function loop() {
    var index = 0
    Tone.Transport.scheduleRepeat(function (time) {
        Tone.Draw.schedule(function () {
            for (let i = 0; i < 4; i++) {
                draw(i, index)
                let player = players[i]
                if (tracks[i][0][index] == 1) {
                    player.start("+0.1")
                }
            }
            if (index < 31) {
                index++
            } else {
                index = 0
            }
        }, time)
    }, "32n");
    Tone.Transport.start()
}

function draw(i, index) {
    if (tracks[i][0][index] == 1) {
        //al sonar una track marco esa fila entera para visualizacion
        $(`.${tracks[i][1]}`).addClass("drummed")
        //reproduzco ese sonido
        player.start("+0.01")
    } else {
        $(`.${tracks[i][1]}`).removeClass("drummed")
    }
}

function play() {

    if (Tone.context.state !== 'running') {
        Tone.context.resume();
    } else {
        Tone.Transport.start()
    }
}

function stop() {
    Tone.Transport.pause()
    console.log("pausado");
}