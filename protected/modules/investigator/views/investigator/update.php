<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */

$this->breadcrumbs=array(
	'Investigators'=>array('index'),
	$model->pk_investigator_id=>array('view','id'=>$model->pk_investigator_id),
	'Update',
);

$this->menu=array(
	/*array('label'=>'List Investigator', 'url'=>array('index')),
	array('label'=>'Create Investigator', 'url'=>array('create')),
	array('label'=>'View Investigator', 'url'=>array('view', 'id'=>$model->pk_investigator_id)),
	array('label'=>'Manage Investigator', 'url'=>array('admin')),*/
);
?>

<h1>Update Profile <?php //echo $model->pk_investigator_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>