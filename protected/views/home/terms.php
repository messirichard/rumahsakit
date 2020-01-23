<div id="content" class="shuttershock customs_cpage">
	
	<div class="container small-width" id="feedback">


		<article class="color2">
			<h1 class="title-page"><?php echo $this->setting['tos_title'] ?></h1>
			<div class="clear height-10"></div>
			<div class="justify_p">
				<?php echo $this->setting['tos_content'] ?>
			</div>
			<div class="clear"></div>
		</article>

			<?php
			$criteria=new CDbCriteria;

			$criteria->with = array('description');

			$criteria->addCondition('description.language_id = :language_id');
			$criteria->params = array(':language_id'=>$this->languageID);
			$faq = Faq::model()->with()->findAll($criteria);
			?>
		<div class="box_terms_list">
			<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
			<?php foreach ($faq as $key => $value): ?>
				
			  <div class="panel panel-default">
			    <div class="panel-heading" role="tab" id="heading<?php echo $key+1 ?>">
			      <h4 class="panel-title">
			        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key+1 ?>" aria-expanded="true" aria-controls="collapse<?php echo $key+1 ?>">
			          <?php echo $value->description->question ?>
			        </a>
			      </h4>
			    </div>
			    <div id="collapse<?php echo $key+1 ?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?php echo $key+1 ?>">
			      <div class="panel-body">
			        <?php echo $value->description->answer ?>
			      </div>
			    </div>
			  </div>
			<?php endforeach ?>
			  <div class="clear"></div>
			</div>
			<div class="clear"></div>
		</div>

		<!-- <div id="testimoni" class="text-center" style="margin-top:50px">
	        <p><?php // echo nl2br($this->setting['home_testimoni']) ?></p>
	        <span><?php //echo $this->setting['home_testimoni_name'] ?></span>
		</div> -->
		<div class="clear"></div>
	</div><!-- .container -->

</div><!-- #content -->

<style type="text/css">
	.box_terms_list{
		display: none;
	}
</style>