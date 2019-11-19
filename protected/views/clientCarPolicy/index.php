<?php
/* @var $this ClientCarPolicyController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Car Policies',
);

$this->menu=array(
	array('label'=>'Create ClientCarPolicy', 'url'=>array('create')),
	array('label'=>'Manage ClientCarPolicy', 'url'=>array('admin')),
);
?>

<h1>Client Car Policies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
