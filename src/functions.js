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
    index = 0
    let obj = JSON.parse(t)
    for (let i = 0; i < 4; i++) {
        tracks[i][0] = obj[i][0]
    }

    $("#tempo").attr("value", bpm)
    Tone.Transport.bpm.value = bpm
    console.log("Track cargado");
}

var index = 0

function loop() {
    Tone.Transport.scheduleRepeat(function (time) {
        Tone.Draw.schedule(function () {
            //console.log(ctx);
            for (let i = 0; i < 4; i++) {

                if (tracks[i][0][index] == 1) {
                    //  console.log(i, index);
                    //  console.log(t_id);
                    //al sonar una track dibujo en canvas la barra de ese sonido
                    if (t_id != null) {
                        draw(i, index, t_id)
                    }
                    //$(`.${tracks[i][1]}`).addClass("drummed")
                } else {

                    //$(`.${tracks[i][1]}`).removeClass("drummed")
                }

                //reproduzco ese sonido
                let player = players[i]
                if (tracks[i][0][index] == 1) {
                    player.start("+0.01")
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

var colores = ["#6D5FF5", "#DE6262", "#F5CA5F", "#6DEB5B"]
/*
 @param i= el track [0,1,2,3]
 @param index= el beat [0-31]
*/
var x = 0

function draw(i, index, id) {
    var canvas = document.getElementById(`${id}`)
    var ctx = canvas.getContext("2d");
    /* quiero q se dibuje la 32ª parte que corresponda
    si index es 4 que se dibuja la 4 linea de 32. 
    beatwidth es el ancho del canvas / cada hueco de los beats */
    let beatWidth = canvas.width / 32
    ctx.fillStyle = colores[i];
    x = beatWidth * index
    //ctx.clearRect(x, canvas.height / 2, beatWidth, canvas.height / 2)

    /* quiero q se dibuje la track que corresponda
     si i es 1 que se dibuja la barra de snare. 
    beatwidth es el ancho del canvas / cada hueco de los beats */
    ctx.fillStyle = "#fff";
    ctx.fillRect(x, canvas.height / 2, beatWidth, canvas.height / 2);
    //ctx.fillStyle = colores[i];
    //ctx.fillRect(x, canvas.height / 2, beatWidth, canvas.height / 2);
}
var t_id;

function play(id) {
    t_id = parseInt(id)
    console.log(id);
    if (Tone.context.state !== 'running') {
        Tone.context.resume();
    } else {
        Tone.Transport.start()
    }
}

function stop() {
    Tone.Transport.stop()
    console.log("pausado");
}