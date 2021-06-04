//esto era para poner un gif de carga si tardaban las iamgenes, pero claro. lo q tarda es el propio gif ahora
// $('#loading').hide();

$(document).ready(function () {
    $(".boton").mouseover(function () {
        $(".boton").removeClass("show");
        $(this).addClass("show");
    })
})