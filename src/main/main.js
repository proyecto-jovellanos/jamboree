$(document).ready(function () {
    $('#loading').hide();
    $(".boton").mouseover(function () {
        $(".boton").removeClass("show");
        $(this).addClass("show");
    })
})