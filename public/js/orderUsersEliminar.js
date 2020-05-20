$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderUsersEliminar/filtroEliminar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#usuariosEliminar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroEliminar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});