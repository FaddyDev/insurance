<?php
/* @var $this ClientPolicyPaymentController */
/* @var $model ClientPolicyPayment */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-policy-payment-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->hiddenField($model,'fk_policy_payment_cp_id',array('value'=>$fkPolicy)); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'fk_policy_payment_cp_id'); ?>
		<?php //echo $form->textField($model,'fk_policy_payment_cp_id'); ?>
		<?php //echo $form->error($model,'fk_policy_payment_cp_id'); ?>
	</div>-->

	<?php echo $form->hiddenField($model,'policy_payment_amount',array('value'=>$amount)); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'policy_payment_amount'); ?>
		<?php //echo $form->textField($model,'policy_payment_amount',array('value'=>$amount,'readonly'=>true)); ?>
		<?php //echo $form->error($model,'policy_payment_amount'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'policy_payment_receipt_no'); ?>
		<?php echo $form->textField($model,'policy_payment_receipt_no',array('size'=>20,'maxlength'=>20,'placeholder'=>'M-Pesa receipt')); ?>
		<?php echo $form->error($model,'policy_payment_receipt_no'); ?>
	</div>

	<?php echo $form->hiddenField($model,'policy_payment_status',array('value'=>'Paid')); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'policy_payment_status'); ?>
		<?php //echo $form->textField($model,'policy_payment_status',array('size'=>50,'maxlength'=>50)); ?>
		<?php //echo $form->error($model,'policy_payment_status'); ?>
	</div>-->

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'policy_payment_datetime'); ?>
		<?php //echo $form->textField($model,'policy_payment_datetime'); ?>
		<?php //echo $form->error($model,'policy_payment_datetime'); ?>
	</div>-->

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->