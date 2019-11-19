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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'pk_claim_id'); ?>
		<?php echo $form->textField($model,'pk_claim_id',array('readonly'=>true)); ?>
		<?php echo $form->error($model,'pk_claim_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_claim_client_policy_id'); ?>
		<?php echo $form->textField($model,'fk_claim_client_policy_id',array('readonly'=>true)); ?>
		<?php echo $form->error($model,'fk_claim_client_policy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_investigator_report'); ?>
		<?php echo $form->textField($model,'claim_investigator_report',array('size'=>60,'maxlength'=>140,'readonly'=>true)); ?>
		<?php echo $form->error($model,'claim_investigator_report'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_investigator_post_datetime'); ?>
		<?php echo $form->textField($model,'claim_investigator_post_datetime',array('readonly'=>true)); ?>
		<?php echo $form->error($model,'claim_investigator_post_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_post_datetime'); ?>
		<?php echo $form->textField($model,'claim_post_datetime',array('readonly'=>true)); ?>
		<?php echo $form->error($model,'claim_post_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_final_verdict'); ?>
		<?php echo $form->textArea($model,'claim_final_verdict',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'claim_final_verdict'); ?>
	</div>

	<!--<div class="row">
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