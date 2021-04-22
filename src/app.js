$(document).ready(function init() {
    console.log("HOLA?");
    $(".button").click(function () {
        ev.preventDefault()
        const synth = new Tone.Synth().toDestination();
        while (true) {
            synth.triggerAttackRelease("C4", "8n");
        }
    })
})