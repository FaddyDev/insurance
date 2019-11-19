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

	
	<?php $this->widget('zii.widgets.CDetailView', array(
		'data'=>$model,
		'attributes'=>array(
			'pk_claim_id',
			'fk_claim_client_policy_id',
			'fkClaimClientPolicy.fkCpPolicy.policy_cover_type',
			'fkClaimClientPolicy.cp_policy_amount',
			'claim_info',
			'claim_investigator_report',
			//'claim_investigator_post_datetime',
			'claim_post_datetime',
			//'claim_final_verdict',
			//'claim_final_verdict_post_datetime',
			'claim_status',
		),
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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php //echo $form->labelEx($model,'fk_claim_client_policy_id'); ?>
		<?php //echo $form->textField($model,'fk_claim_client_policy_id'); ?>
		<?php //echo $form->error($model,'fk_claim_client_policy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_investigator_report'); ?>
		<?php echo $form->textArea($model,'claim_investigator_report',array('sizex'=>60,'maxlength'=>140)); ?>
		<?php echo $form->error($model,'claim_investigator_report'); ?>
	</div>

	<!--<div class="row">
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
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->