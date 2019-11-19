<?php
/* @var $this ProviderController */
/* @var $model Provider */

$this->breadcrumbs=array(
	'Providers'=>array('admin'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Provider', 'url'=>array('index')),
	//array('label'=>'Manage Provider', 'url'=>array('admin')),
);
?>

<h1>Create a Provider Account</h1>

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