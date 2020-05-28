$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "buscaValoraciones/buscadorValoraciones",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#valoraciones').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorValoraciones', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
