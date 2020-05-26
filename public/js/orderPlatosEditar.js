$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderPlatosEditar/filtroPlatoEditar",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#platosEditar').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroPlatoEditar', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
