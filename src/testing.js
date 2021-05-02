$(document).ready(function () {
    console.clear()
    console.log("esta grabando");

    $(".fa-play").click(function (ev) {
        ev.preventDefault()
        //create a synth and connect it to the main output (your speakers)
        const synth = new Tone.Synth().toDestination();
        const now = Tone.now()

        //trigger attack, cuando empieza. release cuando empeia a dejar de sonar.
        //attackRelease una combinacion en uno. 
        //Param: nota,tiempo, para schedule events(When allong the audicontext the note is gonna be played)
        /*   synth.triggerAttack("G#4", now);
          synth.triggerRelease(now + 0.52); */

        /* 
            "4n" = quarter note
            "8t" = eighth note triplet
            "2m" = two measures
            "8n." = dotted-eighth note
        */
        synth.triggerAttackRelease("C3", "8n", now)

    })
    $(".fa-stop").click(function (ev) {
        ev.preventDefault()
    })
})

/* let sound = function () {
    const synth = new Tone.Synth().toDestination();
    while (true) {
        synth.triggerAttackRelease("C4", "8n");
    }
} */