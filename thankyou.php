<?php require_once("resources/config.php");?> <!--connection-->
<?php require_once("shop-cart.php");?> <!--include-->
<?php include (TEMPLATE_FRONT . DS . "header_landing.php") ?> <!--header-->

<?php 

	process_transaction();

?>

	<div class="container">
    
    
    
    
    
    <h4 class="text-center bg-success">Thank you for your payment. Your transaction has been completed, and a receipt for your purchase has been emailed to you. You may log into your account at www.paypal.com to view details of this transaction.</h4>
    
    <h4 class="text-center">Important Notice: Notify the seller about your purchase right after. <a href="contact-us.php">Click Here!</a></h4>

    </div>




<?php include (TEMPLATE_FRONT . DS . "footer.php") ?> <!--footer-->