<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */

$this->breadcrumbs=array(
	'Investigators'=>array('index'),
	'Create',
);

$this->menu=array(
	///array('label'=>'List Investigator', 'url'=>array('index')),
	array('label'=>'Manage Investigators', 'url'=>array('admin')),
);
?>

<h1>Add Investigator</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>