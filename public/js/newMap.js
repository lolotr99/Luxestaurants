$(document).ready(function(){

    function loadIframe(url) {
        var mapa = document.getElementById("newMapa").value;
        var mapaOriginal = "https://maps.google.com/maps?width=100%&height=600&hl=es&q=Madrid&ie=UTF8&t=&z=13&iwloc=A&output=embed";
        if (mapa.length != 0) {
            $('#createMapa').prop('src', url);
            document.getElementById("direccionMapa").value = url;
        }
        else {
            $('#createMapa').prop('src', oculto);
            document.getElementById("direccionMapa").value = mapaOriginal;
        }

    }

    $(document).on('keyup', '#newMapa', function(){
        var url = "https://maps.google.com/maps?width=100%&height=600&hl=es&q=" + $(this).val() +"&ie=UTF8&t=&z=13&iwloc=A&output=embed";
        loadIframe(url);
    });
});