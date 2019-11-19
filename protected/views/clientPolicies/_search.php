<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'pk_cp_id'); ?>
		<?php echo $form->textField($model,'pk_cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_cp_client_id'); ?>
		<?php echo $form->textField($model,'fk_cp_client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'fk_cp_policy_id'); ?>
		<?php echo $form->textField($model,'fk_cp_policy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp_policy_period'); ?>
		<?php echo $form->textField($model,'cp_policy_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp_policy_expiry_date'); ?>
		<?php echo $form->textField($model,'cp_policy_expiry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cp_policy_count'); ?>
		<?php echo $form->textField($model,'cp_policy_count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->