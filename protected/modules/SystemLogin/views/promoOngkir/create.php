<?php
$this->breadcrumbs=array(
	'Promo Ongkir'=>array('index'),
	'Add',
);

$this->pageHeader=array(
	'icon'=>'fa fa-cubes',
	'title'=>'Promo Ongkir',
	'subtitle'=>'Add Promo Ongkir',
);

$this->menu=array(
	array('label'=>'List Promo Ongkir', 'icon'=>'th-list','url'=>array('index')),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>