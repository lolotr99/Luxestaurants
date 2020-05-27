$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderReservasEliminar/filtroReservaEliminar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#reservasEliminar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroReservaEliminar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
