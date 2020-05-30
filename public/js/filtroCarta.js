$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "carta/filtroCarta",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#carta').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtroCarta', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});

