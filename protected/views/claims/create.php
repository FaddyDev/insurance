<?php
/* @var $this ClaimsController */
/* @var $model Claims */

$this->breadcrumbs=array(
	'Claims'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Claims', 'url'=>array('index')),
	array('label'=>'Manage Claims', 'url'=>array('admin')),
	array('label'=>'My Policies', 'url'=>array('clientPolicies/admin')),
);
?>

<h1>File Claim</h1>

<?php $this->renderPartial('_form', array('model'=>$model,'clientPolicy'=>$clientPolicy)); ?>