<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */

$this->breadcrumbs=array(
	'Client Policies'=>array('index'),
	$model->pk_cp_id,
);

$this->menu=array(
	//array('label'=>'List ClientPolicies', 'url'=>array('index')),
	//array('label'=>'Create ClientPolicies', 'url'=>array('create')),
	array('label'=>'Approve Client Policy', 'url'=>array('update', 'id'=>$model->pk_cp_id, 'verd'=>1),'visible'=>$model->cp_approval==0),
	array('label'=>'Reject Client Policy', 'url'=>array('update', 'id'=>$model->pk_cp_id, 'verd'=>2),'visible'=>$model->cp_approval==0),
	//array('label'=>'Delete ClientPolicies', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_cp_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Client Policies', 'url'=>array('admin')),
);
?>

<h1>View Client Policy #<?php echo $model->pk_cp_id; ?></h1>


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
		//'pk_cp_id',
		array(
			'label'=>'Client',
			'value'=>$model->fkCpClient->client_fname." ".$model->fkCpClient->client_lname,
			),
		array(
			'label'=>'Cover',
			'value'=>$model->fkCpPolicy->policy_cover_type,
			),
		//'policy_price',
		array(
			'label'=>'Price (Ksh)',
			'value'=>$model->fkCpPolicy->policy_price,
			),
		//'policy_period',
		array(
			'label'=>'Client Set Period (months)',
			'value'=>$model->fkCpPolicy->policy_period,
			),
		array(
			'label'=>'Policy Description',
			'value'=>$model->fkCpPolicy->policy_description,
			),
		array(
			'label'=>'Period (months)',
			'value'=>$model->cp_policy_period,
			),
		array(
			'label'=>'Count',
			'value'=>$model->cp_policy_count,
			),
		array(
			'label'=>'Amount (Ksh)',
			'value'=>$model->cp_policy_amount,
			),
		array(
			'label'=>'Expiry Date',
			'value'=>$model->cp_policy_expiry_date,
			),
			'cp_status',
	),
)); ?>
