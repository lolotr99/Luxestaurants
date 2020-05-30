$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "buscaPlatosEditar/buscadorPlatosEditar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#platosEditar').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorPlatosEditar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
