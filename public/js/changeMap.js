$(document).ready(function(){

    function loadIframe(url) {
        var mapa = document.getElementById("mapa").value;
        var oculto = document.getElementById("mapaOriginal").value;
        if (mapa.length != 0) {
            $('#updateMapa').prop('src', url);
            document.getElementById("direccion").value = url;
        }
        else {
            $('#updateMapa').prop('src', oculto);
            document.getElementById("direccion").value = oculto;

        }

    }

    $(document).on('keyup', '#mapa', function(){
        var url = "https://maps.google.com/maps?width=100%&height=600&hl=es&q=" + $(this).val() +"&ie=UTF8&t=&z=13&iwloc=A&output=embed";
        loadIframe(url);
    });
});