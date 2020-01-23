<?php
$this->breadcrumbs=array(
	'Member Companies'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List MemberCompany','url'=>array('index')),
	array('label'=>'Add MemberCompany','url'=>array('create')),
);
?>

<h1>Manage Member Companies</h1>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?><br/><br/>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'member-company-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'title',
		'sub_title',
		'content',
		'image',
		'sorting',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
		),
	),
)); ?>
