$(document).ready(function () {
    console.clear()
    $("#abrirForm").click(function (ev) {
        ev.preventDefault()
        $("#formChange").show()

    })
    $("#btnC").click(function (ev) {
        ev.preventDefault()
        $("#formChange").hide()
        $(".contrap").html("Contraseña recién cambiada")
    })
})