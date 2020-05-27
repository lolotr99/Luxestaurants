$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderReservasEditar/filtroReservaEditar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#reservasEditar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroReservaEditar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
