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

    })

    $(".fa-stop").click(function (ev) {
        ev.preventDefault()
        
    })

    /* evento a cada beat para pulsarlo */
    $(".beat").click(function (ev) {
        ev.preventDefault()
        console.log(this);
        $(this).toggleClass("marked")
        leerMarked()
    })

    //Funcion lectora de todos los beats para crear objeto track
    function leerMarked() {
        for (const pista in track) {
            for (let i = 1; i < 33; i++) {
                $(`.${pista}>.beat.${i}`).hasClass("marked") ?
                    track[pista][i-1] = 1 : track[pista][i-1] = 0
            }
        }
        console.log(track);
    }
})