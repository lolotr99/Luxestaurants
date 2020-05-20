$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderUsersEditar/filtroEditar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#usuariosEditar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroEditar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});