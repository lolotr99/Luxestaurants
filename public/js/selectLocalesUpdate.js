$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "selectRestaurantesUpdate/buscadorUpdate",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#updateRestaurantes').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#restaurantesUpdate', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});