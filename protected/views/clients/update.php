<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	$model->pk_client_id=>array('view','id'=>$model->pk_client_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Create Clients', 'url'=>array('create')),
	array('label'=>'View Clients', 'url'=>array('view', 'id'=>$model->pk_client_id)),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
);
?>

<h1>Update Clients <?php echo $model->pk_client_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>