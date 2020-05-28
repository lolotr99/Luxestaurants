$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderValoracionesEliminar/filtroValoracionEliminar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#valoracionesEliminar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroValoracionEliminar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
