<?php
$this->breadcrumbs=array(
	'Company Member'=>array('index'),
	// $model->title=>array('view','id'=>$model->id),
	'Edit',
);

$this->pageHeader=array(
	'icon'=>'fa fa-minus',
	'title'=>'Company Member',
	'subtitle'=>'Edit Company Member',
);

$this->menu=array(
	array('label'=>'List Company Member', 'icon'=>'th-list','url'=>array('index')),
	array('label'=>'Add Company Member', 'icon'=>'plus-sign','url'=>array('create')),
	// array('label'=>'View Company Member', 'icon'=>'pencil','url'=>array('view','id'=>$model->id)),
);
?>

<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>