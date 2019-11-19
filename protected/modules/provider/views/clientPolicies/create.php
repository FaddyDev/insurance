<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List ClientPolicies', 'url'=>array('index')),
	array('label'=>'Manage ClientPolicies', 'url'=>array('admin')),
);
?>

<h1>Create ClientPolicies</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>