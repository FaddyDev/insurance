<?php
/* @var $this ClaimPaymentController */
/* @var $model ClaimPayment */

$this->breadcrumbs=array(
	'Claim Payments'=>array('index'),
	$model->pk_claim_payment_id,
);

$this->menu=array(
	//array('label'=>'List ClaimPayment', 'url'=>array('index')),
	array('label'=>'Make Claim Payment', 'url'=>array('create', 'id'=>$model->fk_claim_payment_claim_id)),
	array('label'=>'Update Claim Payment', 'url'=>array('update', 'id'=>$model->pk_claim_payment_id)),
	//array('label'=>'Delete Claim Payment', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->pk_claim_payment_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Claim Payments', 'url'=>array('admin')),
);
?>
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

<h1>View ClaimPayment #<?php echo $model->pk_claim_payment_id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'pk_claim_payment_id',
		'fk_claim_payment_claim_id',
		'claim_payment_receipt_no',
		'claim_payment_amount',
		'claim_payment_status',
		'claim_payment_datetime',
	),
)); ?>
