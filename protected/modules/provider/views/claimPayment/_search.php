<?php
/* @var $this ClaimPaymentController */
/* @var $model ClaimPayment */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_claim_payment_id'); ?>
		<?php echo $form->textField($model,'pk_claim_payment_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_claim_payment_claim_id'); ?>
		<?php echo $form->textField($model,'fk_claim_payment_claim_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_payment_receipt_no'); ?>
		<?php echo $form->textField($model,'claim_payment_receipt_no',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_payment_amount'); ?>
		<?php echo $form->textField($model,'claim_payment_amount'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_payment_status'); ?>
		<?php echo $form->textField($model,'claim_payment_status',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_payment_datetime'); ?>
		<?php echo $form->textField($model,'claim_payment_datetime'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->