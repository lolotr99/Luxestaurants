$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "selectRestaurantes/buscador",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#selectLocales').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorSelect', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});