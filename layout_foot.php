</div>
    <!-- /container -->
 
<script src="js/jquery-1.11.3.js"></script>
<script src="js/jquery-2.1.4.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
 
<script>
$(document).ready(function(){
    $('.add-to-cart').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "add_to_cart.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
      
    });
      
		
    $('.update-quantity').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "update_quantity.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
    });
	$('.confirm-order').click(function(){
        var id = $(this).closest('tr').find('.product-id').text();
        var name = $(this).closest('tr').find('.product-name').text();
        var quantity = $(this).closest('tr').find('input').val();
        window.location.href = "confirm.php?id=" + id + "&name=" + name + "&quantity=" + quantity;
    });
	


});
</script>
</body>
</html>