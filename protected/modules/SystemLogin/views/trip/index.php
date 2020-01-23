<?php
$this->breadcrumbs=array(
	'Trip',
);
$this->pageHeader=array(
	'icon'=>'fa fa-user',
	'title'=>'Trip',
	'subtitle'=>'Data Trip',
);

$this->menu=array(
	array('label'=>'Add Trip', 'icon'=>'plus-sign', 'url'=>array('create')),
);
?>
<?php $this->widget('bootstrap.widgets.TbButtonGroup',array('buttons'=>$this->menu,)); ?>
<?php if(Yii::app()->user->hasFlash('success')): ?>

    <?php $this->widget('bootstrap.widgets.TbAlert', array(
        'alerts'=>array('success'),
    )); ?>

<?php endif; ?>
<?php
$year = Trips::model()->findAll('1 GROUP BY `year`');
?>
<?php foreach ($year as $tahun): ?>
<h2><?php echo $tahun->year ?></h2>
<?php
$bulan = array(
	'1'=>array('1','Januari'),
	'2'=>array('2','February'),
	'3'=>array('3','Maret'),
	'4'=>array('4','April'),
	'5'=>array('5','Mei'),
	'6'=>array('6','Juni'),
	'7'=>array('7','July'),
	'8'=>array('8','Agustus'),
	'9'=>array('9','September'),
	'10'=>array('10','Oktober'),
	'11'=>array('11','November'),
	'12'=>array('12','Desember'),
);
$bulan = array_chunk($bulan, 4);
?>
<?php foreach ($bulan as $key => $value): ?>
<div class="row">
	<?php foreach ($value as $k => $v): ?>
		<div class="span3">
<div class="widget">
<h4 class="widgettitle"><?php echo $v[1] ?></h4>
<div class="widgetcontent">
			<?php if (count($data[$tahun->year][$v[0]]) > 0): ?>
				<?php foreach ($data[$tahun->year][$v[0]] as $val): ?>
				<?php echo $val['trip'] ?> (<?php echo $val['awal'] ?> - <?php echo $val['akhir'] ?>) 
				&nbsp;
				<a href="<?php echo CHtml::normalizeUrl(array('update', 'id'=>$val['id'])); ?>" rel="tooltip" title="Update" class="update"><i class="fa fa-pencil"></i></a>
				&nbsp;
				<a href="<?php echo CHtml::normalizeUrl(array('delete', 'id'=>$val['id'])); ?>" rel="tooltip" title="Delete" class="delete"><i class="fa fa-trash-o"></i></a> <br>
				<?php endforeach ?>
			<?php endif ?>
</div>
</div>
		</div>
	<?php endforeach ?>
</div>
<?php endforeach ?>
<?php endforeach ?>

