<?php require_once("resources/config.php");?> <!--connection-->
<?php include (TEMPLATE_FRONT . DS . "header_landing.php") ?> <!--header here-->

			<div role="main" class="main">
				<div class="container">
					<div class="row">
						<div class="col-md-12 center">
							<h1 class="mt-xlg mb-sm pt-md">Get in <strong>Touch</strong></h1>
							<p class="font-size-md">You have something to tell regarding your order? Or want to ask us anything? Do contact us!</p>

							<hr class="custom-divider">
						</div>
					</div>
				</div>

				<section class="section section-default mb-none">
					<div class="container">
						<div class="row">
							<div class="col-md-4">

								<h5 class="mb-xs mt-xl">CALL US(HOME)</h5>
								<p><i class="fa fa-phone"></i>+603-89260757</p>

								<h5 class="mb-xs mt-xl">CALL US(MOBILE)</h5>
								<p><i class="fa fa-phone"></i>+6013-2106252</p>

								<h5 class="mb-xs mt-xl">Visit Us</h5>
								<p><i class="fa fa-map-marker"></i>	No. 57, Jalan 4/9G 43650 Bandar Baru Bangi Selanggor </p>

								<!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
								<div id="googlemaps" class="google-map small"></div>

								<p><a href="http://maps.google.com/" target="_blank">(Get Directions)</a></p>

							</div>
							<div class="col-md-4">
								<h5 class="mb-xs mt-xl">Delivery Hours</h5>

								<ul class="list list-icons list-dark mt-md">
									<li><i class="fa fa-clock-o"></i> Monday - Friday - 9am to 5pm</li>
									<li><i class="fa fa-clock-o"></i> Saturday - 9am to 2pm</li>
									<li><i class="fa fa-clock-o"></i> Sunday - Closed</li>
								</ul>

						
							</div>
							<div class="col-md-4">
								<h5 class="mb-md mt-xl">Send a Message</h5>

								<form id="contactForm" action="php/contact-form.php" method="POST">
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Your name *</label>
												<input type="text" value="" data-msg-required="Please enter your name." maxlength="100" class="form-control" name="name" id="name" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Your email address *</label>
												<input type="email" value="" data-msg-required="Please enter your email address." data-msg-email="Please enter a valid email address." maxlength="100" class="form-control" name="email" id="email" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Subject</label>
												<input type="text" value="" data-msg-required="Please enter the subject." maxlength="100" class="form-control" name="subject" id="subject" required>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="form-group">
											<div class="col-md-12">
												<label>Message *</label>
												<textarea maxlength="5000" data-msg-required="Please enter your message." rows="3" class="form-control" name="message" id="message" required></textarea>
											</div>
										</div>
									</div>
									<div class="row">
										<div class="col-md-12">
											<input type="submit" value="Send Message" class="btn btn-primary" data-loading-text="Loading...">

											<div class="alert alert-success hidden" id="contactSuccess">
												Message has been sent to us.
											</div>

											<div class="alert alert-danger hidden" id="contactError">
												Error sending your message.
											</div>
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>

<?php include (TEMPLATE_FRONT . DS . "footer_contact.php") ?> <!--footer-->