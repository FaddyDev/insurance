<?php
/* @var $this ProviderController */
/* @var $model Provider */

$this->breadcrumbs=array(
	'Providers'=>array('admin'),
	$model->pk_provider_id=>array('view','id'=>$model->pk_provider_id),
	'Update',
);

$this->menu=array(
	/*array('label'=>'List Provider', 'url'=>array('index')),
	array('label'=>'Create Provider', 'url'=>array('create')),
	array('label'=>'View Provider', 'url'=>array('view', 'id'=>$model->pk_provider_id)),
	array('label'=>'Manage Provider', 'url'=>array('admin')),*/
);
?>

<h1>Update Profile <?php //echo $model->pk_provider_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>