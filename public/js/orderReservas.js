$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderReservas/filtroReserva",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#reservas').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroReserva', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
