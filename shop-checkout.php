<?php require_once("resources/config.php");?> <!--connection-->
<?php require_once("shop-cart.php");?> <!--include-->
<?php include (TEMPLATE_FRONT . DS . "header_landing.php") ?> <!--header-->



		<div role="main" class="main shop">
				<div class="container">
  
				
				<div class="row">
               
						<div class="col-md-12">
							<hr class="tall">
                            <h4 class="text-center ">Notice: Total Minmum purchase of RM20</h4>
                             <h4 class="text-center bg-danger"><?php display_message(); ?> </h4>
						</div>
					</div>

					<div class="row">
						<div class="col-md-12">

							<div class="featured-boxes">
								<div class="row">
									<div class="col-md-12">
										<div class="featured-box featured-box-primary align-left mt-sm">
											<div class="box-content">
                                                  <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
                                                    <input type="hidden" name="cmd" value="_cart">
                                                    <input type="hidden" name="business" value="ahbear507-facilitator@gmail.com">
                                                    <input type="hidden" name="currency_code" value="MYR">
													<table class="shop_table cart">
														<thead>
															<tr>
																<th class="product-remove">&nbsp;
																	
																</th>
																<th class="product-thumbnail">&nbsp;
																	
																</th>
																<th class="product-name">
																	Product
																</th>
																<th class="product-price">
																	Price
																</th>
																<th class="product-quantity">
																	Quantity
																</th>
																<th class="product-subtotal">
																	Total
																</th>
															</tr>
														</thead>
														<tbody>
															
														<?php cart(); ?>		

	
														</tbody>
													</table>
													<?php   echo	show_paypal(); ?>
												</form>
											</div>
										</div>
									</div>
								</div>
							</div>

							<div class="featured-boxes">
								<div class="row">
									<div class="col-sm-6 col-sm-offset-6">
										<div class="featured-box featured-box-primary align-left mt-xlg">
											<div class="box-content">
												<h4 class="heading-primary text-uppercase mb-md">Cart Totals</h4>
												<table class="cart-totals">
													<tbody>
														<tr class="cart-subtotal">
															<th>
																<strong>Cart Subtotal</strong>
															</th>
															<td>
																<strong><span class="amount">RM<?php  echo isset($_SESSION['item_total']) ? $_SESSION['item_total']: $_SESSION['item_total'] = "0";           ?></span></strong>
															</td>
														</tr>
														<tr class="shipping">
															<th>
																Shipping
															</th>
															<td>
																Free Shipping<input type="hidden" value="free_shipping" id="shipping_method" name="shipping_method">
															</td>
														</tr>
														<tr class="shipping">
															<th>
																Items
															</th>
															<td>
																<strong><span class="amount"><?php  echo isset($_SESSION['item_quantity']) ? $_SESSION['item_quantity']: $_SESSION['item_quantity'] = "0"; ?></span></strong>																
															</td>
														</tr>                                                        
														<tr class="total">
															<th>
																<strong>Order Total</strong>
															</th>
															<td>
																<strong><span class="amount">RM<?php echo isset($_SESSION['item_total']) ? $_SESSION['item_total']: $_SESSION['item_total'] = "";                ?></span></strong>
															</td>
														</tr>
													</tbody>
												</table>
											</div>
										</div>
									</div>
								</div>

							</div>


						</div>
					</div>

				</div>

			</div>

<?php include (TEMPLATE_FRONT . DS . "footer.php") ?> <!--footer-->