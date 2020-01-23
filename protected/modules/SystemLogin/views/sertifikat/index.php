<?php
$this->breadcrumbs=array(
	'Certificates',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Certificates',
	'subtitle'=>'Data Certificates',
);

$this->menu=array(
	array('label'=>'Add Certificates', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h4 class="widgettitle">Certificates</h4>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'member-company-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'info_sertifikat',
		// 'sub_title',
		// 'content',
		// 'image',
		// 'sorting',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
