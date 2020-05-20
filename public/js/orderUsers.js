$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "orderUsers/filtro",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#usuarios').html(data.datos);
            }
        })
    }

    $(document).on('change', '#filtro', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});