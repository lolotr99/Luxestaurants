$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderValoracionesEditar/filtroValoracionEditar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#valoracionesEditar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroValoracionEditar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
