<?php
/* @var $this ClientPoliciesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Client Policies',
);

$this->menu=array(
	array('label'=>'Create ClientPolicies', 'url'=>array('create')),
	array('label'=>'Manage ClientPolicies', 'url'=>array('admin')),
);
?>

<h1>Client Policies</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
