<?php
/* @var $this ClientCarPolicyController */
/* @var $model ClientCarPolicy */

$this->breadcrumbs=array(
	'Client Car Policies'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List ClientCarPolicy', 'url'=>array('index')),
	//array('label'=>'Manage ClientCarPolicy', 'url'=>array('admin')),
	array('label'=>'My Policies', 'url'=>array('clientPolicies/admin')),
);
?>

<h1>Update Car Policy Details</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'fkPolicy'=>$fkPolicy)); ?>