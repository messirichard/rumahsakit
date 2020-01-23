<div class="content-text text-center mw-836 tengah">
	<h4>SERTIFIKASI</h4>
	<p>&nbsp;</p>
	<?php 
	$criteria_faq = new CDbCriteria();
	$criteria_faq->order = "sort ASC";
	$model_faq = Faq::model()->findAll($criteria_faq);
	?>
	<div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
	<?php
	$i = 1;
	foreach ($model_faq as $key => $value): ?>
		  <div class="panel panel-default">
		    <div class="panel-heading" role="tab" id="heading<?php echo $key ?>">
		      <h5 class="panel-title">
		        <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse<?php echo $key ?>" aria-expanded="true" aria-controls="collapse<?php echo $key ?>">
		          <?php echo $value->question; ?>
		        </a>
		      </h5>
		    </div>
		    <div id="collapse<?php echo $key ?>" class="panel-collapse collapse <?php echo ($i==1)? 'in':''; ?>" role="tabpanel" aria-labelledby="heading<?php echo $key ?>">
		      <div class="panel-body">
		        <p><?php echo strip_tags($value->answer); ?></p>
		      </div>
		    </div>
		  </div>

		<?php $i++; ?>
	<?php endforeach; ?>
	</div>
	<p>&nbsp;</p>
</div>