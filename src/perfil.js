$(document).ready(function () {
    console.clear()
    $("#abrirForm").click(function (ev) {
        ev.preventDefault()
        $("#formChange").show()

    })

    //si en url hay new password ocultar form y mostrar nueva contraseña
    const urlParams = new URLSearchParams(window.location.search);
    if (urlParams.has('new_p')) {
        var new_p = urlParams.get("new_p")
        $("#formChange").hide()
        $(".contrap").html("Contraseña recién cambiada a: " + new_p)
    }
})