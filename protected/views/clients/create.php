<?php
/* @var $this ClientsController */
/* @var $model Clients */

$this->breadcrumbs=array(
	'Clients'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Clients', 'url'=>array('index')),
	array('label'=>'Manage Clients', 'url'=>array('admin')),
);
?>

<h1>Create Client Account</h1>
<?php 

if(isset($_SESSION['status']) && isset($_SESSION['response'])){
	$status = $_SESSION['status']; $response = $_SESSION['response'];
	if($status == 'success'){
		echo '<p class="alert alert-success">'.$response.'</p>';
	}
	else{
		echo '<p class="alert alert-warning">'.$response.'</p>';
	}
	unset($_SESSION['status'],$_SESSION['response']);
}

?>
<?php $this->renderPartial('_form', array('model'=>$model)); ?>