<?php require_once("resources/config.php");?> <!--connection-->
<?php include (TEMPLATE_FRONT . DS . "header_landing.php") ?> <!--header-->

			<div role="main" class="main shop">

				<div class="container">

					<div class="row">
						<div class="col-md-12">
							<hr class="tall">
						</div>
					</div>

					<div class="row">
						<div class="col-md-12 col-sm-offset-3">
							<div class="featured-boxes ">
								<div class="row">
									<div class="col-md-6 align">
										<div class="featured-box featured-box-primary align-left mt-xlg">
											<div class="box-content">
                                                <h4  style="color:#FB0505"><?php display_message(); ?></h4>
                                               
			<!--login-->							<form class="" action=""  id="frmSignIn" method="post">
            
            										<?php login_user();?>
                                                    
													<div class="row">
														<div class="form-group">
															<div class="col-md-12">
																<label>Username</label>
																<input type="text" value="" class="form-control input-lg" name="username">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="form-group">
															<div class="col-md-12">
																<label>Password</label>
																<input type="password" value="" class="form-control input-lg" name="password">
															</div>
														</div>
													</div>
													<div class="row">
														<div class="col-md-6">
															<span class="remember-box checkbox">
																<label for="rememberme">
																	<input type="checkbox" id="rememberme" name="rememberme">Remember Me
																</label>
															</span>
														</div>
														<div class="col-md-6">
														<input name="submit" type="submit" value="Login" class="btn btn-primary pull-right mb-xl" data-loading-text="Loading...">
														</div>
													</div>
												</form>
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
