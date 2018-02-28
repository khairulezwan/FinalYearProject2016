<?php require_once("resources/config.php");?> <!--connection-->
<?php include (TEMPLATE_FRONT . DS . "header_landing.php") ?> <!--header-->

			<div role="main" class="main shop">

				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<hr class="tall">
						</div>
					</div>
					
					<div class="row"> <!--Row starts here-->
						<div class="col-md-6">
                        	
							<?php get_categories_title(); ?>
							<p>Showing results of available products.</p>
						</div>
					</div>
							
                            
					<div class="row">
                    	<ul class="products product-thumb-info-list" data-plugin-masonry>
						<?php	get_products_in_cat_page();	 ?>
                            

						</ul>
					</div> <!--row ends here-->

					<!--<div class="row">
						<div class="col-md-12">
							<ul class="pagination pull-right">
								<li><a href="#"><i class="fa fa-chevron-left"></i></a></li>
								<li class="active"><a href="#">1</a></li>
								<li><a href="#">2</a></li>
								<li><a href="#">3</a></li>
								<li><a href="#"><i class="fa fa-chevron-right"></i></a></li>
							</ul>
						</div>
					</div>-->

				</div>

			</div>
<?php include (TEMPLATE_FRONT . DS . "footer.php") ?> <!--footer-->