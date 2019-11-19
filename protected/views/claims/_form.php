<?php
/* @var $this ClaimsController */
/* @var $model Claims */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'claims-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>


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
	'data'=>$clientPolicy,
	'attributes'=>array(
		'pk_cp_id',
		//'fk_cp_client_id',
		//'fk_cp_policy_id',
		array(
			'name'=>'fk_cp_policy_id',
			'value'=>$clientPolicy->fkCpPolicy->policy_cover_type,
			),
		//'cp_policy_period',
		array(
			'label'=>'Period (months)',
			'value'=>$clientPolicy->cp_policy_period,
			),
		//'cp_policy_amount',
		array(
			'label'=>'Amount (Ksh)',
			'value'=>$clientPolicy->cp_policy_amount,
			),
		'cp_policy_expiry_date',
		'cp_policy_count',
		'cp_status',
	),
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>
	

	<?php echo $form->hiddenField($model,'fk_claim_client_policy_id',array('value'=>$clientPolicy->pk_cp_id)); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'fk_claim_client_policy_id'); ?>
		<?php //echo $form->textField($model,'fk_claim_client_policy_id',array('value'=>$clientPolicy->pk_cp_id,'readonly'=>true)); ?>
		<?php //echo $form->error($model,'fk_claim_client_policy_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'claim_info'); ?>
		<?php echo $form->textArea($model,'claim_info',array('size'=>60,'maxlength'=>140,'placeholder'=>'Short description of the claim')); ?>
		<?php echo $form->error($model,'claim_info'); ?>
	</div>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'claim_investigator_report'); ?>
		<?php //echo $form->textField($model,'claim_investigator_report',array('size'=>60,'maxlength'=>140)); ?>
		<?php //echo $form->error($model,'claim_investigator_report'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'claim_investigator_post_datetime'); ?>
		<?php //echo $form->textField($model,'claim_investigator_post_datetime'); ?>
		<?php //echo $form->error($model,'claim_investigator_post_datetime'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'claim_post_datetime'); ?>
		<?php //echo $form->textField($model,'claim_post_datetime'); ?>
		<?php //echo $form->error($model,'claim_post_datetime'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'claim_final_verdict'); ?>
		<?php //echo $form->textField($model,'claim_final_verdict',array('size'=>60,'maxlength'=>100)); ?>
		<?php //echo $form->error($model,'claim_final_verdict'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'claim_final_verdict_post_datetime'); ?>
		<?php //echo $form->textField($model,'claim_final_verdict_post_datetime'); ?>
		<?php //echo $form->error($model,'claim_final_verdict_post_datetime'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'claim_status'); ?>
		<?php //echo $form->textField($model,'claim_status'); ?>
		<?php //echo $form->error($model,'claim_status'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'File' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->