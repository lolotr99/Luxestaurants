$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "selectRestaurantesDelete/buscadorDelete",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#deleteRestaurantes').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#restaurantesDelete', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});