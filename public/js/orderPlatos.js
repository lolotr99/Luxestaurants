$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderPlatos/filtroPlato",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#platos').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroPlato', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
