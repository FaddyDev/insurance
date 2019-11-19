<?php
/* @var $this InvestigatorController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Investigators',
);

$this->menu=array(
	array('label'=>'Create Investigator', 'url'=>array('create')),
	array('label'=>'Manage Investigator', 'url'=>array('admin')),
);
?>

<h1>Investigators</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
