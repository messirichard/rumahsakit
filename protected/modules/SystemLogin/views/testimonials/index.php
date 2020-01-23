<?php
$this->breadcrumbs=array(
	'Testimonial',
);

$this->pageHeader=array(
	'icon'=>'fa fa-comment',
	'title'=>'Testimonial',
	'subtitle'=>'Data Testimonial',
);

$this->menu=array(
	// array('label'=>'Add Testimonial', 'icon'=>'plus-sign','url'=>array('create')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Testimonial</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'testimonials-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'nama',
		'email',
		'subjek',
		'date_add',
		/*
		'date_modif',
		'status',
		*/
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}',
		),
	),
)); ?>
