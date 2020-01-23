<?php
$this->breadcrumbs=array(
	'setting'=>array('/SystemLogin/setting/index'),
	'Home Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-home',
	'title'=>'Home',
	'subtitle'=>'Home Edit',
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

<div class="row-fluid">
	<div class="span12">
		<div class="widget">
		<h4 class="widgettitle">Section Hero Slide</h4>
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
						<?php $type = 'home_heroslide_title'; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor" rows="4"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>

						<div class="divider5"></div>
						<?php $type = 'home_heroslide_content' ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>
							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>

					</div>
				</div>

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
				<div class="row-fluid multiple_section">
					<?php 
					// widget home 1
				for ($i=1; $i < 5; $i++) { ?>
				<div class="span6">
					<div class="data_list">
						<?php $type = 'home_widget_banner_pict_'.$i; ?>
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
						<?php $type = 'home_widget_banner_title_'.$i; ?>
						<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" value="<?php echo $model[$type]['desc'][$value->code]->value ?>">

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
						<div class="divider5"></div>
						<?php $type = 'home_widget_banner_content_'.$i ?>
						<?php Common::createSetting($type, 'Content', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>
							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>

						<div class="divider5"></div>
						<?php $type = 'home_widget_banner_type_url_'.$i; ?>
						<?php Common::createSetting($type, 'Tipe Link', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<!-- <input id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" value="<?php echo $model[$type]['desc'][$value->code]->value ?>"> -->
								<select name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" id="Setting_<?php echo $type ?>_<?php echo $value->code ?>">
									<option <?php echo ($model[$type]['desc'][$value->code]->value == 'statis_url')? 'selected="selected"':''; ?> value="statis_url">Statis URL</option>
									<option <?php echo ($model[$type]['desc'][$value->code]->value == 'youtube')? 'selected="selected"':''; ?> value="youtube">Youtube URL</option>
								</select>

							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
						
						<div class="divider5"></div>
						<?php $type = 'home_widget_banner_link_url_'.$i; ?>
						<?php Common::createSetting($type, 'Link', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span8')) ?>
						<div class="clear"></div>
					</div>
					<div class="divider15"></div>
				</div>
				<?php } ?>
				</div>
				<div class="divider15"></div>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
		</div>
		</div>
		<!-- end section 1 -->

		<div class="widget">
		<h4 class="widgettitle">Section 2</h4>
		<div class="widgetcontent">

			<div class="row-fluid">
				<div class="span12">
					<div class="data_list">
						<?php $type = 'home_section_2_content'; ?>
						<?php Common::createSetting($type, 'Top Content', 'textarea', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span12 redactor"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>
							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>

						<div class="divider5"></div>
						<?php $type = 'home_section_2_text_link'; ?>
						<?php Common::createSetting($type, 'Text Link', 'text', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<input id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span6" value="<?php echo $model[$type]['desc'][$value->code]->value ?>">
							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
						<div class="divider5"></div>
						<?php $type = 'home_section_2_url_link'; ?>
						<?php Common::createSetting($type, 'Link', 'text', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::textField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span6')) ?>
						<div class="clear"></div>
					</div>
				</div>
			</div>

			<div class="divider15"></div>
			<div class="row-fluid">
				<div class="span6">
					<?php $type = 'home_section_2_picture_left_1'; ?>
						<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
						<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
						<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
						<p class="help-block">NOTE: Picture size 888 x 747px, Larger image will be automatically cropped.</p>
						<?php if ($model[$type]['data']->value): ?>
							<div style="">
								<img style="height: auto; max-width: 100%;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
							</div>
							<div class="clearfix" style="height: 15px;"></div>
							<div class="clearfix" style="height: 1px;"></div>
						<?php endif ?>
				</div>
				<div class="span6">
					<?php $type = 'home_section_2_picture_right_1'; ?>
					<?php Common::createSetting($type, 'Image Banner Product', 'image', 'n') ?>
					<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
					<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					<p class="help-block">NOTE: Picture size 459 x 332px, Larger image will be automatically cropped.</p>
					<?php if ($model[$type]['data']->value): ?>
						<div style="">
							<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
						</div>
						<div class="clearfix" style="height: 15px;"></div>
						<div class="clearfix" style="height: 1px;"></div>
					<?php endif ?>
					<div class="divider10"></div>
					<?php $type = 'home_section_2_picture_right_2'; ?>
					<?php Common::createSetting($type, 'Image Banner Accessories', 'image', 'n') ?>
					<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
					<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					<p class="help-block">NOTE: Picture size 459 x 332px, Larger image will be automatically cropped.</p>
					<?php if ($model[$type]['data']->value): ?>
						<div style="">
							<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
						</div>
						<div class="clearfix" style="height: 15px;"></div>
						<div class="clearfix" style="height: 1px;"></div>
					<?php endif ?>
				</div>
			</div>
			<div class="divider15"></div>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			<div class="clear clearfix"></div>
			</div>
		</div>
		<!-- end section 2 -->

		<div class="widget">
		<h4 class="widgettitle">Section 3</h4>
		<div class="widgetcontent">
			<div class="row-fluid multiple_section">
				<?php for ($i=1; $i < 5; $i++) { ?>
				<div class="span3">
					<?php $type = 'home_why_banners_pict_'.$i; ?>
					<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
					<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
					<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					<p class="help-block">NOTE: Picture size 79 x 90px, Larger image will be automatically cropped.</p>
					<?php if ($model[$type]['data']->value): ?>
						<div style="">
							<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
						</div>
						<div class="clearfix" style="height: 15px;"></div>
						<div class="clearfix" style="height: 1px;"></div>
					<?php endif ?>
					<div class="divider5"></div>
					<?php $type = 'home_why_banners_title_'.$i; ?>
					<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
							<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<input id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" value="<?php echo $model[$type]['desc'][$value->code]->value ?>">

						    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
						    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
					<?php endforeach ?>
					<div class="divider5"></div>
					<?php $type = 'home_why_banners_content_'.$i; ?>
						<?php Common::createSetting($type, 'Content', 'textarea', 'y') ?>
						<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
							<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
								<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
								<textarea id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10"><?php echo $model[$type]['desc'][$value->code]->value ?></textarea>
							    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
							    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
							</div>
						<?php endforeach ?>
				</div>
				<?php } ?>
			</div>
			<div class="divider15"></div>

			<h3><b>Advantages</b></h3>
			<div class="divider5"></div>

			<div class="row-fluid multiple_section">
				<?php for ($i=1; $i < 5; $i++) { ?>
				<div class="span3">
					<?php $type = 'home_advantage_banners_pict_'.$i; ?>
					<?php Common::createSetting($type, 'Image Banner', 'image', 'n') ?>
					<label for="Setting_<?php echo $model[$type]['data']->name ?>" class="control-label required"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
					<?php echo CHtml::fileField('Setting['.$model[$type]['data']->name.']', $model[$type]['data']->value, array('class'=>'span12')) ?>
					<p class="help-block">NOTE: Picture size 71 x 63px, Larger image will be automatically cropped.</p>
					<?php if ($model[$type]['data']->value): ?>
						<div style="">
							<img style="height: auto; max-width: 300px;" src="<?php echo Yii::app()->baseUrl; ?>/images/static/<?php echo $model[$type]['data']->value; ?>" alt="">
						</div>
						<div class="clearfix" style="height: 15px;"></div>
						<div class="clearfix" style="height: 1px;"></div>
					<?php endif ?>
					<div class="divider5"></div>
					<?php $type = 'home_advantage_banners_title_'.$i; ?>
					<?php Common::createSetting($type, 'Title', 'text', 'y') ?>
					<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
						<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($value->code==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $value->id ?>">
							<label class="control-label required" for="Setting_<?php echo $type ?>_<?php echo $value->code ?>"><?php echo $model[$type]['data']->label ?><span class="required"></span></label>
							<input id="Setting_<?php echo $type ?>_<?php echo $value->code ?>" name="Setting[<?php echo $type ?>][<?php echo $value->code ?>]" class="span10" value="<?php echo $model[$type]['desc'][$value->code]->value ?>">

						    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>"></span>
						    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
						</div>
					<?php endforeach ?>
					<div class="divider5"></div>
				</div>
				<?php } ?>
			</div>


			<div class="divider15"></div>
			<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>'Save',
				)); ?>
			<div class="clear clearfix"></div>
			</div>
		</div>
		<!-- end section 3 -->

		<div class="widget">
			<h4 class="widgettitle">SEO Page</h4>
			<div class="widgetcontent">
				<?php $type = 'home_meta_title'; ?>
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
				<?php $type = 'home_meta_keyword'; ?>
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
				<?php $type = 'home_meta_description'; ?>
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

<style type="text/css">
	.row-fluid.multiple_section [class*="span"] {
		margin: 0;
		padding: 0 10px;
	}
	.row-fluid.multiple_section input[class*="span"]{
		padding: 0;
	}
</style>