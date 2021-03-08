const AudioContext = window.AudioContext || window.webkitAudioContext;
const audioCtx = new AudioContext();
let wave = audioCtx

window.onload = function () {
    playSweep()
}

function playSweep() {
    let osc = audioCtx.createOscillator();

    console.log(osc);
}