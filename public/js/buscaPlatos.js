$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "buscaPlatos/buscadorPlatos",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#platos').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorPlatos', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
