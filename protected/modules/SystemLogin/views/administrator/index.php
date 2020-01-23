<?php
$this->breadcrumbs=array(
	'Administrator',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Administrator',
	'subtitle'=>'Data Administrator',
);

$this->menu=array(
	array('label'=>'Add User', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<h4 class="widgettitle">Users</h4>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	// 'filter'=>$model,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	// 'htmlOptions'=>array('class'=>''),
	'columns'=>array(
		'email',
		'nama',
		'login_terakhir',
		'tanggal_input',
		array(
			'name'=>'group_id',
			'filter'=>false,
			'value'=>'($data->group_id=="0")? "Full Akses" : "-Admin-" ',
		),
		array(
			'name'=>'aktif',
			'filter'=>array(
				'0'=>'No',
				'1'=>'Yes',
			),
			'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		),

		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} &nbsp; {delete}'
		),
	),
)); ?>

<?php /*
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>array(
	array('label'=>'Add Group', 'icon'=>'plus-sign', 'url'=>array('/SystemLogin/group/create')),
))); ?>

<h1>Groups</h1>
<?php $this->widget('bootstrap.widgets.TbGridView',array(
	'id'=>'group-grid',
	'dataProvider'=>$model2->search(),
	// 'filter'=>$model2,
	'enableSorting'=>false,
	'summaryText'=>false,
	'type'=>'bordered',
	'columns'=>array(
		// 'id',
		'group',
		array(
			'name'=>'aktif',
			'filter'=>array(
				'0'=>'No',
				'1'=>'Yes',
			),
			'value'=>'($data->aktif=="1")? "Yes" : "No" ',
		),
		// 'akses',
		array(
			'class'=>'bootstrap.widgets.TbButtonColumn',
			'template'=>'{update} {delete}',
			'deleteButtonUrl'=>"CHtml::normalizeUrl(array('/SystemLogin/group/delete', 'id'=>\$data->id))",
			'updateButtonUrl'=>"CHtml::normalizeUrl(array('/SystemLogin/group/update', 'id'=>\$data->id))",
		),
	),
)); ?>
*/?>