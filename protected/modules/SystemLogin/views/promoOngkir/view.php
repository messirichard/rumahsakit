<?php
$this->breadcrumbs=array(
	'Promo Ongkirs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List PromoOngkir', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add PromoOngkir', 'icon'=>'plus-sign','url'=>array('create')),
	array('label'=>'Edit PromoOngkir', 'icon'=>'pencil','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete PromoOngkir', 'icon'=>'trash','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
);
?>

<h1>View PromoOngkir #<?php echo $model->id; ?></h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'maxnilaikg',
		'status',
		'date_input',
		'date_end',
	),
)); ?>
