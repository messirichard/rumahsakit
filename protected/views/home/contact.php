<div class="outers_cont_inside_page back-white">

	<h1 style="visibilty: none; display:none;"><?php echo $this->pageTitle ?></h1>
	<div class="insides_toppage_blocks ill_contact prelatife">
		<div class="posbs_full">
			<div class="blocks_text_inpagesn">
		        	<h6><b>AMARI</b> UPVC ROOF</h6>
	        		<p><?php echo $this->setting['contact_hero_title']; ?></p>
	        </div>
        </div>
		<div class="clear"></div>
	</div>
	
	<section class="default_sc cont_pg_grey">
		<div class="container prelatife pg_contact">
			<div class="content-text text-center tengah">
				<div class="maw850 tengah topContact">
					
					<h6><?php echo $this->setting['contact_hero_title']; ?></h6>
					<div class="row">
						<div class="col-md-6 col-sm-6">
							<?php echo $this->setting['contact_left_address_content']; ?>
						</div>
						<div class="col-md-6 col-sm-6">
							<?php echo $this->setting['contact_right_address_content']; ?>
						</div>
					</div>
					<div class="clear height-30"></div>
					<div class="row">
						<div class="col-md-2"></div>
						<div class="col-md-8">
							<div class="clear height-5"></div>
							<p style="font-size: 20px;"><b style="font-weight: 500; color: #6d6d6d;">CALL&nbsp; <i class="fa fa-whatsapp"></i></b> &nbsp;<a style="color: #000; text-decoration: none; font-weight: 700;" href="https://api.whatsapp.com/send?phone=<?php echo str_replace('+', '', str_replace(' ', '', $this->setting['contact_whatsapp'])); ?>"><?php echo $this->setting['contact_whatsapp']; ?></a>
								<br>
								<a style="color: #000; text-decoration: none; font-weight: 700;" href="https://api.whatsapp.com/send?phone=6281230706239">+62 812 3070 6239</a>
							</p>
						</div>
						<div class="col-md-2"></div>
					</div>
					<div class="clear"></div>
				</div>
				<div class="clear height-50"></div><div class="clear height-25"></div>
				<div class="outers_box_formContactpg">
					<div class="top margin-bottom-20">
						<div class="lines-grey"></div>
						<span><?php echo $this->setting['contact_middle_content']; ?></span>
					</div>
					<div class="middles">
						
						<?php echo $this->renderPartial('//home/_form_contact2', array('model' => $model)); ?>

						<!-- <div class="box-form tl-contact-form">
							<div class="clear height-25"></div>
							{% if error|length > 0 %}
							    <div class="alert alert-danger bg-danger">
							    	<button type="button" class="close" data-dismiss="alert">&times;</button>
								    <h6>Please fix the following input errors:</h6>
								    <ul>
								    	{% for dataError in error %}
								    	<li>{{ dataError }}</li>
								    	{% endfor %}
								    </ul>
							    </div>
							{% endif %}
							<div style="max-width:500px; margin:0 auto;">
								{% if msg == 'error_message' %}
								    <div class="alert alert-danger">
								    	<button type="button" class="close" data-dismiss="alert">&times;</button>
									    Please Check Captcha for sending contact form! 
								    </div>
								{% endif %}
								{% if msg == 'success' %}
								    <div class="alert alert-success">
								    	<button type="button" class="close" data-dismiss="alert">&times;</button>
									    Thank you for contacting us! we will respond to you shortly.
								    </div>
								{% endif %}
							</div>
							<form method="post" action="" role="form">
								<div class="row default">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
										    <label for="exampleInputName">Name</label>
										    <div class="clear"></div>
										    <input type="text" name="Contact[name]" class="form-control" id="exampleInputName" required>
										</div>
									</div>
									
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
										    <label for="exampleInputName">Email</label>
										    <div class="clear"></div>
										    <input type="text" name="Contact[email]" class="form-control" id="exampleInputName" required>
										</div>
									</div>
								</div>
								<div class="row default">
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
										    <label for="exampleInputName">Phone</label>
										    <div class="clear"></div>
										    <input type="text" name="Contact[phone]" class="form-control" id="exampleInputName" required>
										</div>
									</div>
									<div class="col-md-6 col-sm-6">
										<div class="form-group">
										    <label for="exampleInputName">Company</label>
										    <div class="clear"></div>
										    <input type="text" name="Contact[company]" class="form-control" id="exampleInputName" required>
										</div>
									</div>
								</div>
								<div class="row default">
									<div class="col-md-12 col-sm-12">
										<div class="form-group">
										    <label for="exampleInputMessage">Message</label> 
										    <div class="clear"></div>
										    <div class="clear"></div>
										    <textarea name="Contact[message]" rows="2" class="form-control" required></textarea>
										</div>
									</div>
								</div>
								
								<div class="row default">
									<div class="col-md-12 col-sm-12">
										<div class="fright-inpd">
											<div class="form-group mb-0">
												<div class="fleft">
													<div id="recaptcha1"></div>
												</div>
												<div class="visible-xs height-10"></div>
												<div class="fright">
													<div class="clear height-2"></div>
													<button type="submit" class="btn btn-default btns-submit-bt"></button>
												</div>
												<div class="clear"></div>
											</div>
										</div>
									</div>
								</div>
								<div class="clear"></div>
							</form> 
							<div class="clear"></div>
						</div> -->

						<div class="clear"></div>
					</div>
				</div>

				<div class="height-10"></div>

				<div class="clear"></div>
			</div>
		</div>
	</section>

	<div class="clear"></div>
</div>

<script src="https://www.google.com/recaptcha/api.js?onload=myCallBack&render=explicit" async defer></script>
<script type="text/javascript">
  var recaptcha1;
  var recaptcha2;
  var myCallBack = function() {
    //Render the recaptcha1 on the element with ID "recaptcha1"
    recaptcha1 = grecaptcha.render('recaptcha1', {
      'sitekey' : '6LeoESkUAAAAALn-vt9or4kwfoFIjC_4otItESOg', //Replace this with your Site key
      'theme' : 'light'
    });
    
    //Render the recaptcha2 on the element with ID "recaptcha2"
    recaptcha2 = grecaptcha.render('recaptcha2', {
      'sitekey' : '6LeoESkUAAAAALn-vt9or4kwfoFIjC_4otItESOg', //Replace this with your Site key
      'theme' : 'light'
    });
  };
</script>

<script type="text/javascript">
	$(function(){
		var $item = $('.full_pg_carousel .carousel .item'); 
		var $wHeight = $(window).height();
		$item.eq(0).addClass('active');
		$item.height($wHeight); 
		$item.addClass('full-screen');

		$('.full_pg_carousel .carousel img').each(function() {
		  var $src = $(this).attr('src');
		  var $color = $(this).attr('data-color');
		  $(this).parent().css({
		    'background-image' : 'url(' + $src + ')',
		    'background-color' : $color
		  });
		  $(this).remove();
		});

		$(window).on('resize', function (){
		  $wHeight = $(window).height();
		  $item.height($wHeight);
		});

		$('.carousel').carousel({
		  interval: 5000,
		  pause: "false"
		});
	})
</script>
<style type="text/css">
	.header.posfull-abs{
		position: relative; top: inherit; left: inherit;
	}
</style>