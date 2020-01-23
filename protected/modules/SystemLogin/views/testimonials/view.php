<?php
$this->breadcrumbs=array(
	'Testimonials'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Testimonials', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Testimonials', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit Testimonials', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Testimonials', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View Testimonials #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nama',
		'email',
		'subjek',
		'pesan',
		'date_add',
		'date_modif',
		'status',
	),
)); ?>
