<?php
$this->breadcrumbs=array(
	'Promo Ongkir'=>array('index'),
	// $model->id=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-cubes',
	'title'=>'Promo Ongkir',
	'subtitle'=>'Edit Promo Ongkir',
);

$this->menu=array(
	array('label'=>'List Promo Ongkir', 'icon'=>'th-list','url'=>array('index')),
	// array('label'=>'Add Promo Ongkir', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Promo Ongkir', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model, 'list_prd'=>$m_prd)); ?>