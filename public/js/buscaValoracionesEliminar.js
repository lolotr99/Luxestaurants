$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "buscaValoracionesEliminar/buscadorValoracionesEliminar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#valoracionesEliminar').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorValoracionesEliminar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
