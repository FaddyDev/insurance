<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */

$this->breadcrumbs=array(
	'Investigators'=>array('index'),
	$model->pk_investigator_id,
);

$this->menu=array(
	array('label'=>'List Investigator', 'url'=>array('index')),
	array('label'=>'Create Investigator', 'url'=>array('create')),
	array('label'=>'Update Investigator', 'url'=>array('update', 'id'=>$model->pk_investigator_id)),
	array('label'=>'Delete Investigator', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_investigator_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Investigator', 'url'=>array('admin')),
);
?>

<h1>View Investigator #<?php echo $model->pk_investigator_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_investigator_id',
		'fk_investigator_provider_id',
		'investigator_idno',
		'investigator_full_name',
		'investigator_email',
		'investigator_photo',
		'investigator_username',
		'investigator_password',
	),
)); ?>
