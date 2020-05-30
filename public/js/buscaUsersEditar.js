$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "buscaUsersEditar/buscadorUsersEditar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#usuariosEditar').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorUsersEditar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
