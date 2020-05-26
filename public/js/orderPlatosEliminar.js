$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderPlatosEliminar/filtroPlatoEliminar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#platosEliminar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroPlatoEliminar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
