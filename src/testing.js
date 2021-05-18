window.onload = function () {
    document.addEventListener("mousedown", function () {


        if (Tone.context.state !== 'running') {
            Tone.context.resume();
        }
        // Tone.context.state === "running"
        console.clear()

        console.log(Tone.context.lookAhead); //=0.1

        const baseSeq = new Tone.ToneAudioBuffers({
            urls: {
                kick: "/Kicks/Kick 01.wav",
                hat: "/Hats/Hat 01.wav",
                snare: "/Snares/Snare (1).wav",
                clap: "/Claps/Clap 01.wav",
            },
            //autostart: true,
            baseUrl: "../media/",
        })

        document.getElementById("boton").onclick = function () {
            //var context = new AudioContext();
            Tone.setContext(new Tone.Context({
                latencyHint: "playback"
            }))

            let k = baseSeq.get("kick");
            let h = baseSeq.get("hat");
            let s = baseSeq.get("snare");
            let c = baseSeq.get("clap");


            const playK = new Tone.Player().toDestination();
            const playH = new Tone.Player().toDestination();
            const playS = new Tone.Player().toDestination();
            const playC = new Tone.Player().toDestination();

            playK.buffer = k
            playH.buffer = h
            playS.buffer = s
            playC.buffer = c

            // loaded para asegurar que se carguen en bufer todos los sonidos
            //Tone.loaded().then(() => {
            Tone.Transport.scheduleRepeat(repite, '8n')
            Tone.Transport.start(0.1)
            let index = 0

            function repite(time) {
                //de 0 a fin de compás, sea 8 o 32...
                let negra = index % 8
                for (let i = 0; i < 2; i++) {
                    playH.start()
                    playK.start()
                }
                index++
                //en teoria con draw mejor para poner visualizacion
                /* Tone.Draw.schedule(function () {
                    console.log("dentro" + context.state);
                    //play sound and images here
                }, time) */
            }
        }
    })
}

//})
/* 
    new A.a.Loop(function (t) {
        A.a.Draw.schedule(function () {
            var t = document.querySelector("#step" + i.index);
            t.classList.add("step-playing"),
            setTimeout(function () {
                t.classList.remove("step-playing")
            }, 100)
        }, t),
        1 == i.seq3[i.index] && i.drum3.triggerAttackRelease("16n"),
        1 == i.seq2[i.index] && i.drum2.triggerAttackRelease("16n"),
        1 == i.seq4[i.index] && i.drum4.triggerAttackRelease("16n"),
        1 == i.seq1[i.index] && i.drum1.triggerAttackRelease("C1", "16n"),
    i.index < 15 ? i.index++ : i.index = 0
}, "16n").start(0) */