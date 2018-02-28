<?php require_once("resources/config.php");?> <!--connection-->
<?php include (TEMPLATE_FRONT . DS . "header_landing.php") ?> <!--header-->
<?php require_once("shop-cart.php");?> <!--include-->
<?php 

					$query =query("SELECT * FROM products WHERE product_id = " . escape_string($_GET['id']).    "");
					confirm($query);
					
					while($row = mysqli_fetch_array($query)):
					
						
?>
		<div role="main" class="main shop">
				
				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<hr class="tall">
						</div>
					</div>

					<div class="row">
						<div class="col-md-6">

							<div class="owl-carousel owl-theme" data-plugin-options='{"items": 1}'>
								<div>
									<div class="thumbnail">
										<img alt="" class="img-responsive img-rounded" src="resources/<?php echo display_image($row['product_image']);  ?>">
									</div>
								</div>
							</div>

						</div>

						<div class="col-md-6">

							<div class="summary entry-summary">

								<h1 class="mb-none"><strong><?php echo $row['product_title']; ?></strong></h1>
								<p class="price">
									<span class="amount"><?php echo "RM ". $row['product_price']; ?></span>
								</p>

								<p class="taller"><?php echo $row['short_desc']; ?></p>

								
									<a href="shop-cart.php?add=<?php echo $row['product_id']; ?>"><button class="btn btn-primary btn-icon">Add to cart</button></a>
								
							</div>


						</div>

                        
					</div>

					<div class="row">
						<div class="col-md-12">
							<div class="tabs tabs-product">
								<ul class="nav nav-tabs">
									<li class="active"><a href="#productDescription" data-toggle="tab">Description</a></li>
									
								</ul>
								<div class="tab-content">
									<div class="tab-pane active" id="productDescription">
										<p><?php echo $row['product_description']; ?></p>
									</div>

								</div>
							</div>
						</div>
					</div>
                        <?php 
						
						endwhile;
	
						?>

				</div>
			
            
            
            
			</div>

			<?php include (TEMPLATE_FRONT . DS . "footer.php") ?> <!--footer-->