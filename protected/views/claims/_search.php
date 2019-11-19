<?php
/* @var $this ClaimsController */
/* @var $model Claims */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_claim_id'); ?>
		<?php echo $form->textField($model,'pk_claim_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_claim_client_policy_id'); ?>
		<?php echo $form->textField($model,'fk_claim_client_policy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_investigator_report'); ?>
		<?php echo $form->textField($model,'claim_investigator_report',array('size'=>60,'maxlength'=>140)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_investigator_post_datetime'); ?>
		<?php echo $form->textField($model,'claim_investigator_post_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_post_datetime'); ?>
		<?php echo $form->textField($model,'claim_post_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_final_verdict'); ?>
		<?php echo $form->textField($model,'claim_final_verdict',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_final_verdict_post_datetime'); ?>
		<?php echo $form->textField($model,'claim_final_verdict_post_datetime'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'claim_status'); ?>
		<?php echo $form->textField($model,'claim_status'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->