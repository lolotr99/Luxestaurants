$(document).ready(function(){

    fetch_customer_data();

    function fetch_customer_data(query = '')
    {
        $.ajax({
            url: "buscaUsers/buscadorUsers",
            method:'GET',
            data:{query:query},
            dataType:'json',
            success:function(data)
            {
                $('#usuarios').html(data.datos);
            }
        })
    }

    $(document).on('keyup', '#buscadorUsers', function(){
        var query = $(this).val();
        fetch_customer_data(query);
    });
});
