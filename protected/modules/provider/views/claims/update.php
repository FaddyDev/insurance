<?php
/* @var $this ClaimsController */
/* @var $model Claims */

$this->breadcrumbs=array(
	'Claims'=>array('admin'),
	$model->pk_claim_id=>array('view','id'=>$model->pk_claim_id),
	'Update',
);

$this->menu=array(
	//array('label'=>'List Claims', 'url'=>array('index')),
	//array('label'=>'Create Claims', 'url'=>array('create')),
	array('label'=>'View Claim', 'url'=>array('view', 'id'=>$model->pk_claim_id)),
	array('label'=>'Manage Claims', 'url'=>array('admin')),
);
?>

<h1>Update Claim #<?php echo $model->pk_claim_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>