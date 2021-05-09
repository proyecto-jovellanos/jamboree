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
        Tone.start()
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
        console.log(track);
    }

    /* 
        //AÑADIIIDO UPDATE: there is a problem in chrome with starting audio context
        //  before a user gesture. This fixes it.
        document.documentElement.addEventListener('mousedown', () => {
            if (Tone.context.state !== 'running') Tone.context.resume();
        });

        const synths = [
            new Tone.Synth(),
            new Tone.Synth(),
            new Tone.Synth(),
            new Tone.Synth()
        ];

        synths[0].oscillator.type = 'triangle';
        synths[1].oscillator.type = 'sine';
        synths[2].oscillator.type = 'sawtooth';
        synths[3].oscillator.type = 'sine';

        const gain = new Tone.Gain(0.6);
        gain.toDestination();

        synths.forEach(synth => synth.connect(gain));

        const $rows = $('.track'),
            notes = ['G5', 'E4', 'C3', 'F3'];
        let index = 0;
        Tone.Transport.scheduleRepeat(repeat, '8n');
        Tone.Transport.start();

        function repeat(time) {
            let step = index % 32;
            for (let i = 0; i < $rows.length; i++) {
                let synth = synths[i],
                    note = notes[i],
                    row = $rows[i];

                let inst = $(row).attr('class').split(' ')[1]
                console.log(inst);
                let input = $(`${inst}>.beat.${step+1}`)
                console.log(input);
                if ($(`${inst}>.beat.${step+1}`).hasClass("marked")) synth.triggerAttackRelease(note, '8n', time);
            }
            index++;
        } */
})