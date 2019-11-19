<?php
/* @var $this ClaimPaymentController */
/* @var $model ClaimPayment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'claim-payment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_claim_payment_claim_id'); ?>
		<?php echo $form->textField($model,'fk_claim_payment_claim_id'); ?>
		<?php echo $form->error($model,'fk_claim_payment_claim_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_payment_receipt_no'); ?>
		<?php echo $form->textField($model,'claim_payment_receipt_no',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'claim_payment_receipt_no'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_payment_amount'); ?>
		<?php echo $form->textField($model,'claim_payment_amount'); ?>
		<?php echo $form->error($model,'claim_payment_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_payment_status'); ?>
		<?php echo $form->textField($model,'claim_payment_status',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'claim_payment_status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'claim_payment_datetime'); ?>
		<?php echo $form->textField($model,'claim_payment_datetime'); ?>
		<?php echo $form->error($model,'claim_payment_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->