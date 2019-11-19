<?php
/* @var $this PolicyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Policies',
);

$this->menu=array(
	array('label'=>'Create Policy', 'url'=>array('create')),
	array('label'=>'Manage Policy', 'url'=>array('admin')),
);
?>

<h1>Policies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
