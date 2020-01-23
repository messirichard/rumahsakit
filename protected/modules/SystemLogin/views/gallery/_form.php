
<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'galery-form',
    // 'type'=>'horizontal',
	'enableAjaxValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>false,
	),
	'htmlOptions' => array('enctype' => 'multipart/form-data'),
)); ?>
<div class="row-fluid">
	<div class="span8">
	<div class="widget">
		<?php if ($model->scenario == 'update'): ?>
		<h4 class="widgettitle">Edit Facility</h4>
		<?php else: ?>
		<h4 class="widgettitle">Add Facility</h4>
		<?php endif ?>
		<div class="widgetcontent">

			<div class="multilang pj-form-langbar">
				<?php foreach (Language::model()->getLanguage() as $key => $value): ?>
				<a href="#" data-index="<?php echo $value->id ?>" data-abbr="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>" class="pj-form-langbar-item <?php if ($value->code==$this->setting['lang_deff']): ?>pj-form-langbar-item-active<?php endif ?>"><abbr style="background-image: url(<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$value->code.'.png' ?>);"></abbr></a>
				<?php endforeach ?>
			</div>
			<div class="divider5"></div>

			<?php echo $form->errorSummary($model); ?>
			<?php echo $form->errorSummary($modelDesc, 'Please fix the following input errors:', 'Periksa di semua bahasa'); ?>
			<?php if(Yii::app()->user->hasFlash('success')): ?>
			
			    <?php $this->widget('bootstrap.widgets.TbAlert', array(
			        'alerts'=>array('success'),
			    )); ?>
			<?php endif; ?>

			<?php Yii::import('ext.imperavi-redactor-widget.ImperaviRedactorWidget'); ?>
			<?php $this->widget('ImperaviRedactorWidget', array(
			    'selector' => '.redactor',
			    'options' => array(
			        'imageUpload'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'image')),
			        'clipboardUploadUrl'=> $this->createUrl('/admin/setting/imgUpload', array('type'=>'clip')),
			    ),
			    'plugins' => array(
			        'clips' => array(
			        ),
			    ),
			)); ?>
			<div class="row-fluid">
				<div class="span6">
					<?php echo Common::createFormDatePick('Date Input', 'Date', 'date', $model->date_input) ?>
				</div>
				<div class="span6">
					<?php echo $form->dropDownListRow($model, 'topik_id', array(
			        		'1'=>'Commercial Building',
			        		'2'=>'Factory & Warehouse',
			        		'3'=>'Residential',
			        	), array('empty'=>'-- Choose Category --')); ?>
							<?php /*
					<?php echo $form->labelEx($model, 'topik_id'); ?>
					<div class="controls">
						<select id="Gallery_topik_id" name="Gallery[topik_id]" class="input-block-level">
							<?php 
							$dataCategory = (PrdCategory::model()->categoryTree('category', $this->languageID));
							?>
							<option value="">---- Choose Category ----</option>
							<?php echo PrdCategory::model()->createOption($dataCategory) ?>
							<option value="">---- Choose Category ----</option>
							<?php foreach ($dataCategory as $key => $value): ?>
								<?php if (count($value['children']) > 0): ?>
								<optgroup label="<?php echo $value['title'] ?>">
									<?php foreach ($value['children'] as $k => $v): ?>
									<option value="<?php echo $v['id'] ?>"><?php echo $v['title'] ?></option>
									<?php endforeach ?>
								</optgroup>
								<?php else: ?>
								<option value="<?php echo $value['id'] ?>"><?php echo $value['title'] ?></option>
								<?php endif ?>
							<?php endforeach ?>
						</select>
					</div>
					<script type="text/javascript">
					$('#Gallery_topik_id').val('<?php echo $model->topik_id ?>');
					</script>
							*/ ?>
		        	<?php // echo $form->textFieldRow($model, 'city',array('class'=>'input-block-level')); ?>
				</div>
			</div>
			

			<?php
			foreach ($modelDesc as $key => $value) {
				$lang = Language::model()->getName($key);
				?>
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">
				<?php
				echo $form->labelEx($value, '['.$lang->code.']title');
			    echo $form->textField($value,'['.$lang->code.']title',array('class'=>'span8', 'maxlength'=>100));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				

				<?php /*
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">
				echo $form->labelEx($value, '['.$lang->code.']sub_title');
			    echo $form->textField($value,'['.$lang->code.']sub_title',array('class'=>'span10', 'maxlength'=>200));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				<?php */ ?>
						
				<?php /*
				<div class="pj-multilang-wrap myLanguage control-group" style="display: <?php if ($key==$this->setting['lang_deff']): ?>block<?php else: ?>none<?php endif ?>;" data-id="<?php echo $lang->id ?>">
				<?php
				echo $form->labelEx($value, '['.$lang->code.']content');
			    echo $form->textArea($value,'['.$lang->code.']content',array('class'=>'span5 redactor', 'maxlength'=>200));
			    ?>
			    <span class="pj-multilang-input"><img src="<?php echo Yii::app()->baseUrl.'/asset/backend/language/'.$lang->code.'.png' ?>"></span>
			    <span class="help-inline _em_" style="display: none;">Please correct the error</span>
				</div>
				*/ ?>

			    <?php
			}
			?>

				<div class="row-fluid">
					<div class="span6">
			        	<?php echo $form->dropDownListRow($model, 'active', array(
			        		'1'=>'Di Tampilkan',
			        		'0'=>'Di Sembunyikan',
			        	)); ?>
						
					</div>
				</div>
			
		</div>
	<!-- span 12 -->
	</div>
	</div>
	<div class="span4">
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Action</h4>
		    </div>
		    <div class="widgetcontent">
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					'buttonType'=>'submit',
					'type'=>'primary',
					'label'=>$model->isNewRecord ? 'Simpan dan Tambahkan' : 'Simpan',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('index')),
					'label'=>'Batal',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php /*<?php if ($model->scenario == 'update'): ?>
				<?php $this->widget('bootstrap.widgets.TbButton', array(
					// 'buttonType'=>'submit',
					// 'type'=>'info',
					'url'=>CHtml::normalizeUrl(array('create', 'copy'=>$model->id)),
					'label'=>'Copy',
					'htmlOptions'=>array('class'=>'btn-large'),
				)); ?>
				<?php endif ?>*/?>
		    </div>
		</div>
		<div class="divider15"></div>
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar Utama</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image',array(
				'hint'=>'<b>Note:</b> Image size is 768 x 571px. Larger images will be auto-cropped', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="max-width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/gallery/'.$model->image , array('method' => 'resize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>
		
		<div class="divider15"></div>
		<?php /*
		<div class="widgetbox block-rightcontent">                        
		    <div class="headtitle">
		        <h4 class="widgettitle">Gambar Pop Up</h4>
		    </div>
		    <div class="widgetcontent">
				<?php echo $form->fileFieldRow($model,'image2',array(
				'hint'=>'<b>Note:</b> Ukuran gambar adalah 640 x 640px. Gambar yang lebih besar akan ter-crop otomatis', 'style'=>"width: 100%")); ?>
				<?php if ($model->scenario == 'update'): ?>
				<img style="max-width: 100%;" src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(200,200, '/images/gallery/'.$model->image2 , array('method' => 'resize', 'quality' => '90')) ?>"/>
				<?php endif; ?>
		    </div>
		</div>
		<div class="divider15"></div>*/ ?>

		<div class="widgetbox block-rightcontent hide hidden">                        
		    <div class="headtitle">
		        <div class="btn-group">
		            <a class="btn tambah-gambar" href="#"><span class="fa fa-plus-circle"></span> &nbsp;Tambah Gambar</a>
		        </div>
		        <h4 class="widgettitle">Gambar Tambahan</h4>
		    </div>
		    <div class="widgetcontent">
		    	<div class="gambar-tempel"></div>
		    	<div class="gambar-add">
					<input type="file" name="GalleryImage[][image]" style="width: 100%;">
					<div class="divider10"></div>
		    	</div>
		    	<p class="help-block"><b>Note:</b> The image size is 1024 x 768px. Larger images will be auto-cropped</p>
				<style>
					#sortable { list-style-type: none; margin: 0; padding: 0; width: 100%; }
					#sortable li { margin: 5px 2.5%; float: left; width: 20%; text-align: center; }
					#sortable li img {width: 96%; border: 2px solid red;}
				</style>
				<ul id="sortable">
					<?php foreach ($modelImage as $key => $value): ?>
					<li class="ui-state-default">
						<img src="<?php echo Yii::app()->baseUrl.ImageHelper::thumb(100,100, '/images/gallery/'.$value->image , array('method' => 'adaptiveResize', 'quality' => '90')) ?>"/>
						<a href="#" class="delete-gambar"><i class="fa fa-trash-o"></i></a>
						<input type="hidden" name="GalleryImage2[]" value="<?php echo $value->image ?>">
					</li>
					<?php endforeach ?>
				</ul>
	            <script type="text/javascript">
	            jQuery(function( $ ) {
					$('.tambah-gambar').tambahData({
						targetHtml: '.gambar-add',
						// html: '<tr><td></td></tr>',
						tambahkan: '.gambar-tempel',
					});
					$( "#sortable" ).sortable();
					$( "#sortable" ).disableSelection();
					$(document).on('click', '.delete-gambar',function( e ) {
						$(this).parent().remove();
						return false;
					})
				})
	            </script>
				<div class="divider5"></div>
				<div class="alert">
				  <button type="button" class="close" data-dismiss="alert">×</button>
				  Drag atau geser gambar untuk mengurutkan
				</div>

		    </div>
		</div>
		<div class="divider15"></div>

	</div>
</div>

<?php $this->endWidget(); ?>
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
