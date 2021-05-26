$(document).ready(function () {
    console.clear()
    var track;
    $.getScript("../functions.js", function () {
        console.log("script cargado");
        loop()
    });

    $(".play").click(function () {
        track = $(this).prev().html()
        cargaTrack(track)
        play()
    })

    $(".pause").click(function () {
        stop()
    })
})