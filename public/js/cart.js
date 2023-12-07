$(document).ready(function(){
    loadcart();

    function loadcart(){
        $.ajax({
            method: "GET",
            url:"/load-cart-data",
            success: function(response){
                $('.cart-count').html('');
                $('.cart-count').html(response.count);
                console.log(response.count)
            }
        })
    }
});