<?php
/* @var $this ClientCarPolicyController */
/* @var $model ClientCarPolicy */

$this->breadcrumbs=array(
	'Client Car Policies'=>array('index'),
	$model->pk_car_id=>array('view','id'=>$model->pk_car_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List ClientCarPolicy', 'url'=>array('index')),
	array('label'=>'Create ClientCarPolicy', 'url'=>array('create')),
	array('label'=>'View ClientCarPolicy', 'url'=>array('view', 'id'=>$model->pk_car_id)),
	array('label'=>'Manage ClientCarPolicy', 'url'=>array('admin')),
);
?>

<h1>Update ClientCarPolicy <?php echo $model->pk_car_id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>