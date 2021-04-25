$(document).ready(function () {

    console.log("esta grabando");

    $(".fa-play").click(function (ev) {
        ev.preventDefault()
        sound.play()
    })
    $(".fa-stop").click(function (ev) {
        ev.preventDefault()
        sound.stop()
    })
})

var sound = new Howl({
    src: ["prueba.mp4"],
    autoplay: true,
    loop: true,
    volume: 0.5,
    onend: function () {
        console.log('Finished!');
    }
});