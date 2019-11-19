<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */

$this->breadcrumbs=array(
	'Investigators'=>array('index'),
	$model->pk_investigator_id,
);

$this->menu=array(
	//array('label'=>'List Investigator', 'url'=>array('index')),
	array('label'=>'Add Investigator', 'url'=>array('create')),
	array('label'=>'Update Investigator', 'url'=>array('update', 'id'=>$model->pk_investigator_id)),
	array('label'=>'Delete Investigator', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_investigator_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Investigators', 'url'=>array('admin')),
);
?>

<h1>View Investigator #<?php echo $model->pk_investigator_id; ?></h1>



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

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_investigator_id',
		//'fk_investigator_provider_id',
		'investigator_idno',
		'investigator_full_name',
		'investigator_email',
		'investigator_username',
		'investigator_password',
	),
)); ?>
