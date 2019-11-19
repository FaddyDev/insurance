<?php
/* @var $this ClaimsController */
/* @var $model Claims */

$this->breadcrumbs=array(
	'Claims'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Claims', 'url'=>array('index')),
	array('label'=>'Manage Claims', 'url'=>array('admin')),
);
?>

<h1>Create Claims</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>