$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "buscaReservasEliminar/buscadorReservasEliminar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#reservasEliminar').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorReservasEliminar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
