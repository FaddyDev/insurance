<?php
/* @var $this ClaimsController */
/* @var $model Claims */

$this->breadcrumbs=array(
	'Claims'=>array('index'),
	$model->pk_claim_id,
);

$this->menu=array(
	array('label'=>'List Claims', 'url'=>array('index')),
	array('label'=>'Create Claims', 'url'=>array('create')),
	array('label'=>'Update Claims', 'url'=>array('update', 'id'=>$model->pk_claim_id)),
	array('label'=>'Delete Claims', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_claim_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Claims', 'url'=>array('admin')),
);
?>

<h1>View Claims #<?php echo $model->pk_claim_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_claim_id',
		'fk_claim_client_policy_id',
		'claim_investigator_report',
		'claim_investigator_post_datetime',
		'claim_post_datetime',
		'claim_final_verdict',
		'claim_final_verdict_post_datetime',
		'claim_status',
	),
)); ?>
