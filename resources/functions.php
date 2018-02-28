<?php

//Helper function

$upload_directory = "uploads";


function last_id(){
	
	global $connection;
	
	 return mysqli_insert_id($connection);
}



function set_message($msg){
	
	if(!empty($msg)){
		$_SESSION['message'] = $msg;
	}else{
		$msg = '';
		
	}
}




function display_message(){
	
	if(isset($_SESSION['message'])){
		
		echo $_SESSION['message'];
		unset($_SESSION['message']);
	}
	
}


function redirect ($location){
	
	header("Location: $location ");
}


function query($sql){
	
	global $connection;
	
	return mysqli_query($connection, $sql);
	
}

function confirm($result){
	
	global $connection;
	
	if(!$result){
		die ("QUERY FAILED" . mysqli_error($connection));
	}
	
}

function escape_string($string){
	
	global $connection;
	
	return mysqli_real_escape_string($connection,$string);
	
}

function fetch_array($result){
	
	return mysqli_fetch_array($result);
}


/**************************************FRONT END FUNCTION***********************************************/


//Get products

function get_products(){
	$query = query("SELECT * FROM products");
	confirm($query);
	
	while($row = mysqli_fetch_array($query)){
$product =<<<DELIMETER
		
						
							<li class="col-md-3 col-sm-6 col-xs-12 product">
								<a href="shop-product-sidebar.html"></a>
								<span class="product-thumb-info">
									<a href="shop-cart.php?add={$row['product_id']}" class="add-to-cart-product">
										<span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
									</a>
									<a href="shop-product-description.php?id={$row['product_id']}">
										<span class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<span class="product-thumb-info-act-left"><em>View</em></span>
												<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
											</span>
											<img alt="" class="img-responsive" src="{$row['product_image']}">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="shop-product-description.php?id={$row['product_id']}">
											<h4>{$row['product_title']}</h4>
											<span class="price">
												<ins><span class="amount">RM {$row['product_price']}</span></ins>
											</span>
										</a>
									</span>
								</span>
							</li>
							
						

DELIMETER;

echo $product;

}
	
		
}
function get_categories(){
															
					$query =query("SELECT * FROM categories");
					confirm($query);
					
					while($row = mysqli_fetch_array($query)){
						$category_links =<<<DELIMETER
						
					<li class='dropdown-submenu'><a href='shop-landing.php?id={$row['cat_id']}'>{$row['cat_title']}</a></li>
						
						
DELIMETER;
																												
echo $category_links;
					
}

//category title
function get_categories_title(){
	
			$query = query("SELECT * FROM categories WHERE cat_id = " . escape_string($_GET['id']) ."");
			confirm($query);
			while($row = mysqli_fetch_array($query)){


				echo "<h1 class='mb-none'><strong>{$row['cat_title']}</strong></h1>";
				
			}
	
}


																
	
}


function get_products_in_cat_page(){
	$query = query("SELECT * FROM products WHERE product_category_id = "  .  escape_string($_GET['id']). " ");
	confirm($query);
	
	while($row = mysqli_fetch_array($query)){
        
    $product_image = display_image($row['product_image']); 
        
$product =<<<DELIMETER
		
						
							<li class="col-md-3 col-sm-6 col-xs-12 product">
								<a href="shop-product-sidebar.html"></a>
								<span class="product-thumb-info">
									<a href="shop-cart.php?add={$row['product_id']}" class="add-to-cart-product">
										<span><i class="fa fa-shopping-cart"></i> Add to Cart</span>
									</a>
									<a href="shop-product-description.php?id={$row['product_id']}">
										<span class="product-thumb-info-image">
											<span class="product-thumb-info-act">
												<span class="product-thumb-info-act-left"><em>View</em></span>
												<span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
											</span>
											<img alt="" class="img-responsive" src="resources/{$product_image}">
										</span>
									</a>
									<span class="product-thumb-info-content">
										<a href="shop-product-description.php?id={$row['product_id']}">
											<h4>{$row['product_title']}</h4>
											<span class="price">
												<ins><span class="amount">RM {$row['product_price']}</span></ins>
											</span>
										</a>
									</span>
								</span>
							</li>
							
						

DELIMETER;

echo $product;

}


}







// LOG IN

function login_user(){
	
	if(isset($_POST['submit'])){
	
		$username = escape_string($_POST['username']);
		$password = escape_string($_POST['password']);	
		
		
		$query = query("SELECT * FROM users WHERE username = '{$username}' AND password = '{$password}' ");
		confirm($query);
		
		if (mysqli_num_rows($query) == 0){
			
				set_message("Your password or username are wrong");
				redirect("shop-login.php");
			
			}else {
				$_SESSION['username'] = $username;
				
				redirect("admin-index.php"); // change this to admin page
			}
		
	
	}
		
	
}



/**************************************BACK END FUNCTION***********************************************/

//Admin order
function display_orders(){
	$query = query("SELECT * FROM orders");
	confirm($query);	

	while($row = mysqli_fetch_array($query)){
$orders =<<<DELIMETER
		
						
      <tr>
           <td>{$row['order_id']}</td>
           <td>{$row['order_amount']}</td>
           <td>{$row['order_transaction']}</td>
           <td>{$row['order_currency']}</td>
           <td>{$row['order_status']}</td>
		   <td><a class="btn btn-danger" href="resources/template/back/delete_order.php?id={$row['order_id']}"><span class="remove"><i class="fa fa-times"></i></span></a></td>
      </tr>
							
						

DELIMETER;

echo $orders;

	}	
	
	
}

//Admin content
function display_orders_admin_content(){
	$query = query("SELECT * FROM orders");
	confirm($query);	

	while($row = mysqli_fetch_array($query)){
$orders =<<<DELIMETER
		
						
			  <tr>
				  <td>{$row['order_id']}</td>
				  <td>{$row['order_transaction']}</td>
				  <td>{$row['order_currency']}</td>
				  <td>{$row['order_status']}</td>
			  </tr>
							
						

DELIMETER;

echo $orders;

	}	
	
	
}


function display_image($picture){
    
    global $upload_directory;
    
    return $upload_directory . DS . $picture;
    
    
}



//Admin products
function get_products_in_admin(){
	
	$query = query("SELECT * FROM products");
	confirm($query);
	
	while($row = mysqli_fetch_array($query)){
$category =show_product_categories($row['product_category_id']);
        
$product_image = display_image($row['product_image']);        
        
$product =<<<DELIMETER
		
						
      <tr>
            <td>{$row['product_id']}</td>
            <td>{$row['product_title']} <br>
              <a href="admin-index.php?edit_product&id={$row['product_id']}"><img width ='100' src="resources/{$product_image}" alt=""></a>  
            </td>
            <td>{$category}</td>
            <td>{$row['product_price']}</td>
			<td>{$row['product_quantity']}</td>
			<td><a class="btn btn-danger" href="resources/template/back/delete_product.php?id={$row['product_id']}"><span class="remove"><i class="fa fa-times"></i></span></a></td>
        </tr>
							
						

DELIMETER;

echo $product;

}
	
		
}

function show_product_categories($product_category_id){
    
    
    $category_query = query("SELECT * FROM categories WHERE cat_id = '{$product_category_id}'");
    confirm($category_query);
    
    while ($category_row = fetch_array($category_query)){
        
        return $category_row['cat_title'];
        
        
    }
    
}




// Adding products in admin


function add_product(){
	
if(isset($_POST['publish']))	{
	
	
	$product_title = 		escape_string($_POST['product_title']);
	$product_category_id = 	escape_string($_POST['product_category_id']);
	$product_price = 		escape_string($_POST['product_price']);
	$product_description = 	escape_string($_POST['product_description']);
	$short_desc = 			escape_string($_POST['short_desc']);
	$product_quantity = 	escape_string($_POST['product_quantity']);
	$product_image = 		escape_string($_FILES['file']['name']);
	$image_temp_location = 	escape_string($_FILES['file']['tmp_name']);

	
	move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image );
	
	
//IF PROBLEM REMNOVE THIS
	
		if(empty($product_title)|| empty($product_price) || empty($product_description) || empty($product_quantity)|| empty($product_category_id)){
		
			echo "<p class='text-center bg-danger'>This * field cannot be empty</p>";		
		
	} else {
	
	$query = query("INSERT INTO products(product_title, product_category_id, product_price, product_description, short_desc, product_quantity, product_image) VALUES('{$product_title}', '{$product_category_id}', '{$product_price}','{$product_description}', '{$short_desc}', '{$product_quantity}', '{$product_image}')");
	$last_id = last_id();
	confirm($query);
	set_message("New product with id {$last_id} was added");
	
	redirect("admin-index.php?products"); //Fix this if have problems
	
	}
	
}
 



	
}


//update product

function update_product(){
	
if(isset($_POST['update']))	{
	
	
	$product_title = 		escape_string($_POST['product_title']);
	$product_category_id = 	escape_string($_POST['product_category_id']);
	$product_price = 		escape_string($_POST['product_price']);
	$product_description = 	escape_string($_POST['product_description']);
	$short_desc = 			escape_string($_POST['short_desc']);
	$product_quantity = 	escape_string($_POST['product_quantity']);
	$product_image = 		escape_string($_FILES['file']['name']);
	$image_temp_location = 	escape_string($_FILES['file']['tmp_name']);

	
    
    if(empty($product_image)){
        
        $get_pic = query("SELECT product_image FROM products WHERE product_id=".escape_string($_GET['id'])." ");
        confirm($get_pic);
        
        while($pic = fetch_array($get_pic)){
            $product_image = $pic['product_image'];
        }
        
    }
    
    
    
    
	move_uploaded_file($image_temp_location, UPLOAD_DIRECTORY . DS . $product_image );
	
	
	
	$query = "UPDATE products SET ";
	$query .= "product_title           = '{$product_title}'            , ";
    $query .= "product_category_id     = '{$product_category_id}'      , ";
    $query .= "product_price           = '{$product_price}'            , ";
    $query .= "product_description     = '{$product_description}'      , ";
    $query .= "short_desc              = '{$short_desc}'               , ";
    $query .= "product_quantity        = '{$product_quantity}'         , ";
    $query .= "product_image           = '{$product_image}'             ";
    $query .= "WHERE product_id=" . escape_string($_GET['id']);
    
    
    $send_update_query = query($query);
	confirm($send_update_query);
	set_message("Product has been updated");
	
	redirect("admin-index.php?products"); //Fix this if have problems
	
	
}
 



	
}

function show_categories_add_product_page(){
	$query = query("SELECT * FROM categories");
	confirm($query);
	
	while($row = mysqli_fetch_array($query)){
$categories_option =<<<DELIMETER
		
						
<option value="{$row['cat_id']}">{$row['cat_title']}</option>
							
						

DELIMETER;

echo $categories_option;

}


}

//Show product title admin

function show_product_category_title(){
    
    $category_query = query("SELECT * FROM categories WHERE cat_id='{$product_category_id}'");
    confirm($category_query);
    
    
    while($category_row = fetch_array($category_query)){
        
        return $category_row['cat_title'];
        
    }
    
    
}

/********************** CATEGORIES IN ADMIN **************************/


function show_categories_in_admin(){
    
	
    $category_query = query("SELECT * FROM categories");
    confirm($category_query);
    
    
    
    while($row = fetch_array($category_query)){
        
        $cat_id = $row['cat_id'];
        $cat_title = $row['cat_title'];
            
$category =<<<DELIMETER
		
        <tr>
            <td>{$cat_id}</td>
            <td>{$cat_title}</td>
			<td><a class="btn btn-danger" href="resources/template/back/delete_category.php?id={$row['cat_id']}"><span class="remove"><i class="fa fa-times"></i></span></a></td
        </tr>						

							
						

DELIMETER;

echo $category;
        
    }
    
}

function add_category(){
	
	if(isset($_POST['add_category'])){
		
			$cat_title = escape_string($_POST['cat_title']);
			
	if(empty($cat_title) || $cat_title == " " ){
		
			echo "<p class='text-center bg-danger'>Title field cannot be empty</p>";		
		
	}else {
		
	
			$insert_cat = query("INSERT INTO categories(cat_title) VALUES('{$cat_title}')");
			confirm($insert_cat);
			set_message("Category Created");

			
			
		}
		
	}
}

//Admin users

function display_users(){
    
	
    $category_query = query("SELECT * FROM users");
    confirm($category_query);
    
    
    
    while($row = fetch_array($category_query)){
        
        $user_id = $row['user_id'];
        $username = $row['username'];
        $email = $row['email'];		
        $password = $row['password'];
		$f_name = $row['f_name'];
		$l_name = $row['l_name'];
		            
$user =<<<DELIMETER
		
        <tr>
            <td>{$user_id}</td>
            <td>{$username}</td>
			<td>{$email}</td>
			<td>{$f_name}</td>
			<td>{$l_name}</td>
			<td><a class="btn btn-danger" href="resources/template/back/delete_user.php?id={$row['user_id']}"><span class="remove"><i class="fa fa-times"></i></span></a></td
        </tr>						

							
						

DELIMETER;

echo $user;
        
    }
    
}

function add_user() {
	
	if(isset($_POST['add_user'])){
		
			$username = escape_string($_POST['username']);
			$email = escape_string($_POST['email']);
			$password = escape_string($_POST['password']);
			$first_name = escape_string($_POST['first_name']);
			$last_name = escape_string($_POST['last_name']);
			//$user_photo = escape_string($_FILES['file']['name']);
			//$photo_temp = escape_string($_FILES['file']['tmp_name']);
			
			//move_uploaded_file($photo_temp, UPLOAD_DIRECTORY . DS . $user_photo);
			
	
	if(empty($username) || empty($username) || empty($password) ){
		
			echo "<p class='text-center bg-danger'>The * field cannot be empty</p>";		
		
	}else {
	
	$query = query("INSERT INTO users(username,email,password,f_name,l_name) VALUES('{$username}','{$email}','{$password}','{$first_name}','{$last_name}')");
	  confirm($query);
	  set_message("User Created");
	redirect("admin-index.php?users");			
		
	}
	
			
	}
	
}
/*********************Admin reports***************************/

function get_reports(){
	
	$query = query("SELECT * FROM reports");
	confirm($query);
	
	while($row = mysqli_fetch_array($query)){
        
        
$report =<<<DELIMETER
		
						
      <tr>
	  		<td>{$row['report_id']}</td>
            <td>{$row['product_id']}</td>
			<td>{$row['order_id']}</td>
			<td>RM{$row['product_price']}</td>
            <td>{$row['product_title']}</td>
			<td>{$row['product_quantity']}</td>
			<td><a class="btn btn-danger" href="resources/template/back/delete_report.php?id={$row['report_id']}"><span class="remove"><i class="fa fa-times"></i></span></a></td>
        </tr>
							
						

DELIMETER;

echo $report;

}
	
		
}

?>