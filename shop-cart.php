<?php require_once("resources/config.php");?>
<!--connection-->

<?php 

	if(isset($_GET['add'])){
			
		$query = query("SELECT * FROM products WHERE product_id=" . escape_string($_GET['add']) . " ");	
		confirm($query);
		
		while($row = fetch_array($query)){
			
			if($row['product_quantity'] != $_SESSION['product_' . $_GET['add']]) {
				
					$_SESSION['product_' . $_GET['add']] += 1;
					redirect("shop-checkout.php");

					
			}else {
				
				set_message("We only have " . $row['product_quantity'] . " " . " {$row['product_title']}"." available");
				redirect("shop-checkout.php");
			}
			
		}
		
		
	}
	

	
	if(isset($_GET['remove'])){
		
		$_SESSION['product_' . $_GET['remove']]--;
		
		if($_SESSION['product_' . $_GET['add']] < 1){
			
		unset($_SESSION['item_total']);
		unset($_SESSION['item_quantity']);			
			
			
			redirect("shop-checkout.php");
			
			
		} else{
			
				redirect("shop-checkout.php");
			
			}
		
		
	}
	

	
	
	
	if(isset($_GET['delete'])){
		
		$_SESSION['product_' . $_GET['delete']] = '0';
		
		unset($_SESSION['item_total']);
		unset($_SESSION['item_quantity']);
		
		
		redirect("shop-checkout.php");
	}
	
function cart(){
	
	$total = 0;
	$item_quantity = 0;
	$item_name = 1;
	$item_number = 1;
	$amount = 1;
	$quantity =1;
	
	
	
foreach ($_SESSION as $name => $value) {
	
	
	if($value > 0){
		
	if(substr ($name, 0, 8) == "product_"){
		
		
	$length = strlen($name - 8);
	
	
	$id = substr($name, 8, $length);
		
			
	$query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). "");
	confirm($query);
	
	while($row = fetch_array($query)){
		
		
		$sub = $row['product_price']*$value;
		$item_quantity +=$value; 
        
        $product_image = display_image($row['product_image']);
		
		
		$product = <<<DELIMETER
		
		  <tr class="cart_table_item">
		  <td class="product-remove">
			  <a title="Remove this item" class="remove" href="shop-cart.php?delete={$row['product_id']}">
				  <i class="fa fa-times"></i>
			  </a>
		  </td>
		  <td class="product-thumbnail">
			  <a href="#">
				  <img width="100" height="100" alt="" class="img-responsive" src="resources/{$product_image}">
			  </a>
		  </td>
		  <td class="product-name">
			  <a href="#">{$row['product_title']}</a>
		  </td>
		  <td class="product-price">
			  <span class="amount">RM{$row['product_price']}</span>
		  </td>
		  <td class="product-quantity">
			  <form enctype="multipart/form-data" method="post" class="cart">
				  <div class="quantity">
					  <a href="shop-cart.php?remove={$row['product_id']}"><input type="button" class="minus" value="-"></a>
					  <input type="text" class="input-text qty text" title="Qty" value="{$value}" name="quantity" min="1" step="1">
					  <a href="shop-cart.php?add={$row['product_id']}"><input type="button" class="plus" value="+"></a>
				  </div>
			  </form>
		  </td>
		  <td class="product-subtotal">
			  <span class="amount">RM{$sub}</span>
		  </td>
	  </tr>
		
	<input type="hidden" name="item_name_{$item_name}" value="{$row['product_title']}">
  	<input type="hidden" name="item_number_{$item_number}" value="{$row['product_id']}">
  	<input type="hidden" name="amount_{$amount}" value="{$row['product_price']}">
	<input type="hidden" name="quantity_{$quantity}" value="{$value}">
		
		
		
DELIMETER;
		
		echo $product;
		
		$item_name++;
		$item_number++;
		$amount++;
		$quantity++;		
		
	}
	
	
	$_SESSION['item_total'] = $total += $sub;
	$_SESSION['item_quantity'] = $item_quantity;
			
		}		
				
		
	}
		
		
	}

}

function show_paypal(){
	
	if(isset($_SESSION['item_total']) && $_SESSION['item_total'] >=20 ) {
	
	$paypal_button = <<<DELIMETER
	
	  <input type="image" name="upload"
	  src="https://www.paypalobjects.com/en_US/i/btn/btn_buynow_LG.gif"
	  alt="PayPal - The safer, easier way to pay online">	
	
DELIMETER;

return $paypal_button;

	}
}






function process_transaction(){


	
	
if(isset($_GET['tx'])) {
	
	$amount = $_GET['amt'];
	$currency = $_GET['cc'];
	$transaction = $_GET['tx'];
	$status = $_GET['st'];
		
	
	$total = 0;
	$item_quantity = 0;

	
	
	
foreach ($_SESSION as $name => $value) {
	
	
	if($value > 0){
		
	if(substr ($name, 0, 8) == "product_"){
		
		
	$length = strlen($name - 8);
	$id = substr($name, 8, $length);
	
	$send_order = query("INSERT INTO orders (order_amount, order_transaction, order_currency, order_status) VALUES('{$amount}','{$transaction}','{$currency}','{$status}')");
	$last_id = last_id();
	confirm($send_order);		
			
	$query = query("SELECT * FROM products WHERE product_id = " . escape_string($id). "");
	confirm($query);
	
	while($row = fetch_array($query)){
		
		$product_price =  $row['product_price'];
		$product_title =  $row['product_title'];
		$sub = $row['product_price']*$value;
		$item_quantity +=$value; 
		

		
	$insert_report = query("INSERT INTO reports (product_id, order_id, product_title, product_price, product_quantity) VALUES('{$id}','{$last_id}','{$product_title}','{$product_price}','{$value}')");
	confirm($insert_report);		
		
		
		
		
	}
	
	
	$total += $sub;
	
			
		}		
				
		
	}
		
		
	}
		session_destroy();
}else {
	
	redirect("index.php");
}


}



	
?>