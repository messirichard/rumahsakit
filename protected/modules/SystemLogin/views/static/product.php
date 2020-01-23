<?php
$this->breadcrumbs=array(
	'setting'=>array('/SystemLogin/setting/index'),
	'Products Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-home',
	'title'=>'Products',
	'subtitle'=>'Products Edit',
);
?>
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'setting-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>

<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
<?php $this->widget('ImperaviRedactorWidget', array(
    'selector' => '.redactor',
    'options' => array(
        'imageUpload'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'image')),
        'clipboardUploadUrl'=> $this->createUrl('admin/setting/uploadimage', array('type'=>'clip')),
    ),
    'plugins' => array(
        'clips' => array(
        ),
    ),
)); ?>

<div class="row-fluid">
	<div class="span12">
		<div class="widget">
		<h4 class="widgettitle">Section Cover</h4>
		<div class="widgetcontent">
			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>

				<?php if(Yii::app()->user->hasFlash('success')): ?>
				    <?php $this->widget('bootstrap.widgets.TbAlert', array(
				        'alerts'=>array('success'),
				    )); ?>
				<?php endif; ?>

				<div class="row-fluid">
					<div class="span12">
					<?php $type = 'product_hero_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input value="<?php echo $model[$type]['desc'][$value->code]->value ?>" type="text" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>
				<div class="divider5"></div>
				<div class="row-fluid hide hidden">
					<div class="span12">
						<?php $type = 'product_hero_subtitle'; ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span5 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
					</div>
				</div>

				<div class="divider5"></div>
				<?php $type = 'product_hero_background'; ?>
				<?php Common::createSetting($type, 'Picture', 'image', 'n') ?>
				<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
				<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
				<p class="help-block">NOTE: Picture size 1920 x 960px, Larger image will be automatically cropped.</p>
				<?php if ($model[$type]['data']->value): ?>
					<div style="">
						<img style="height: auto; max-width: 980px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
					</div>
					<div class="clearfix" style="height: 15px;"></div>
					<div class="clearfix" style="height: 1px;"></div>
				<?php endif ?>
				<div class="divider15"></div>

				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
		</div>
		</div>

		<div class="widget">
		<h4 class="widgettitle">Section 1</h4>
			<div class="widgetcontent">
					<div class="row-fluid">
						<div class="span6">
							<?php $type = 'product_section1_picture'; ?>
						<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture size 293 x 176px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 15px;"></div>
							<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
						<div class="divider5"></div>

						<?php $type = 'product_section1_youtube'; ?>
						<?php Common::createSetting($type, 'Link', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span6')) ?>

						</div>
						<div class="span6">
							<?php $type = 'product_section1_content'; ?>
							<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
							<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
								<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
									<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
									<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor" rows="3"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

								    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
								    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
								</div>
							<?php endforeach ?>
						</div>
					</div>

					
					<div class="divider15"></div>


				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			</div>
		</div>

		<div class="widget">
		<h4 class="widgettitle">Section 2</h4>
			<div class="widgetcontent">
					<div class="row-fluid">
						<div class="span12">
						<?php $type = 'product_section2_pictures'; ?>
						<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture size 293 x 176px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 15px;"></div>
							<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
						
						<div class="divider5"></div>
						<?php $type = 'product_section2_content'; ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor" rows="3"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>

						</div>
					</div>

					
					<div class="divider15"></div>


				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			</div>
		</div>


		<div class="widget">
		<h4 class="widgettitle">Section 3</h4>
			<div class="widgetcontent">
					<div class="row-fluid">
						<div class="span12">
						<?php $type = 'product_section3_pictures'; ?>
						<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture size 1292 x 394px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 100%;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 15px;"></div>
							<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
						
						<div class="divider10"></div>
						<div class="row-fluid">
							<div class="span6">
								<?php $type = 'product_section3_titles1'; ?>
								<?php Common::createSetting($type, 'Sub Title', 'text', 'y') ?>
								<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
									<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
										<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
										<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" rows="1"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

									    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
									</div>
								<?php endforeach ?>
								<div class="divider10"></div>
								<?php $type = 'product_section3_content1'; ?>
								<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
								<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
									<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
										<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
										<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor" rows="3"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

									    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
									</div>
								<?php endforeach ?>
							</div>
							<div class="span6">
								<?php $type = 'product_section3_titles2'; ?>
								<?php Common::createSetting($type, 'Sub Title', 'text', 'y') ?>
								<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
									<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
										<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
										<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" rows="1"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

									    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
									</div>
								<?php endforeach ?>
								<div class="divider10"></div>
								<?php $type = 'product_section3_content2'; ?>
								<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
								<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
									<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
										<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
										<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor" rows="3"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

									    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
									    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
									</div>
								<?php endforeach ?>
							</div>
						</div>
						

						</div>
					</div>
					<div class="divider15"></div>
					
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			</div>
		</div>

		<div class="widget">
			<h4 class="widgettitle">SEO Page</h4>
			<div class="widgetcontent">
				<?php $type = 'product_meta_title'; ?>
				<?php Common::createSetting($type, 'Meta Title', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12" rows="2"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>	
				<div class="divider5"></div>
				<?php $type = 'product_meta_keyword'; ?>
				<?php Common::createSetting($type, 'Meta Keywords', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12" rows="3"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>	
				<div class="divider5"></div>
				<?php $type = 'product_meta_description'; ?>
				<?php Common::createSetting($type, 'Meta Description', 'text', 'y') ?>
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
					<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
						<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12" rows="4"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

					    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
					    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
					</div>
				<?php endforeach ?>	
				<div class="divider5"></div>
				<p class="help-block">*) If not setting seo page, will be use seo setting from general setup</p>
				<div class="divider5"></div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
						'buttonType'=>'submit',
						'type'=>'primary',
						'label'=>'Save',
					)); ?>
				<div class="clearfix"></div>				
			</div>
		</div>
		<!-- end seo -->

	</div>
</div>

<script type="text/javascript">
if (typeof RedactorPlugins === 'undefined') var RedactorPlugins = {};

RedactorPlugins.advanced = {
    init: function()
    {
        alert(1);
    }
}
jQuery(function( $ ) {
	$('.multilang').multiLang({
	});
})
</script>
<?php $this->endWidget(); ?>
<style type="text/css" media="screen">
	.row-fluid.list_data{
		margin: 0 -0.8em;
	}
	.row-fluid.list_data .span4{
		margin-left: 0;
		padding: 0 0.8em;
	}
</style>