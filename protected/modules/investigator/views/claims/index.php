<?php
/* @var $this ClaimsController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Claims',
);

$this->menu=array(
	array('label'=>'Create Claims', 'url'=>array('create')),
	array('label'=>'Manage Claims', 'url'=>array('admin')),
);
?>

<h1>Claims</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
