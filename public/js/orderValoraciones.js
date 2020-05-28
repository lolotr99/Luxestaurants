$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderValoraciones/filtroValoracion",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#valoraciones').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroValoracion', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
