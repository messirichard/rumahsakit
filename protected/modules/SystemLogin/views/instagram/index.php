<?php
$this->breadcrumbs=array(
	'Instagram',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Instagram',
	'subtitle'=>'Data Instagram',
);

$this->menu=array(
	array('label'=>'Add Instagram', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h1>Instagram</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	// 'htmlOptions'=>array('class'=>''),
	'columns'=>array(
		'username',
		'first_name',
		'bio',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}'
		),
	),
)); ?>

