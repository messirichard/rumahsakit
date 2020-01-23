<?php
$this->breadcrumbs=array(
	'Promo Ongkirs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PromoOngkir','url'=>array('index')),
	array('label'=>'Add PromoOngkir','url'=>array('create')),
);
?>

<h1>Manage Promo Ongkirs</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'promo-ongkir-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'maxnilaikg',
		'status',
		'date_input',
		'date_end',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
