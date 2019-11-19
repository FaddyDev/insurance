<?php
/* @var $this ClientPolicyPaymentController */
/* @var $model ClientPolicyPayment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_policy_payment_id'); ?>
		<?php echo $form->textField($model,'pk_policy_payment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_policy_payment_cp_id'); ?>
		<?php echo $form->textField($model,'fk_policy_payment_cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_payment_amount'); ?>
		<?php echo $form->textField($model,'policy_payment_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_payment_receipt_no'); ?>
		<?php echo $form->textField($model,'policy_payment_receipt_no',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_payment_status'); ?>
		<?php echo $form->textField($model,'policy_payment_status',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'policy_payment_datetime'); ?>
		<?php echo $form->textField($model,'policy_payment_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->