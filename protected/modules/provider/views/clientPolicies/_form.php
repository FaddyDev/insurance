<?php
/* @var $this ClientPoliciesController */
/* @var $model ClientPolicies */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'client-policies-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<?php $action=$reason=''; if($verd == 1){$action = 'approving'; $reason = 'Good to go';}
	else{$action = 'rejecting'; $reason = 'Does not qualify';}?>
	<br><p class="note"><?php echo 'State the reason for <strong>'.$action.'</strong> this request!'; ?></p>

	<?php echo $form->errorSummary($model); ?>

	<?php /* ?>
	<div class="row">
		<?php echo $form->labelEx($model,'pk_cp_id'); ?>
		<?php echo $form->textField($model,'pk_cp_id'); ?>
		<?php echo $form->error($model,'pk_cp_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_cp_client_id'); ?>
		<?php echo $form->textField($model,'fk_cp_client_id'); ?>
		<?php echo $form->error($model,'fk_cp_client_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fk_cp_policy_id'); ?>
		<?php echo $form->textField($model,'fk_cp_policy_id'); ?>
		<?php echo $form->error($model,'fk_cp_policy_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_policy_period'); ?>
		<?php echo $form->textField($model,'cp_policy_period'); ?>
		<?php echo $form->error($model,'cp_policy_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_policy_expiry_date'); ?>
		<?php echo $form->textField($model,'cp_policy_expiry_date'); ?>
		<?php echo $form->error($model,'cp_policy_expiry_date'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_policy_count'); ?>
		<?php echo $form->textField($model,'cp_policy_count'); ?>
		<?php echo $form->error($model,'cp_policy_count'); ?>
	</div>
	<?php */ ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cp_action_reason'); ?>
		<?php echo $form->textArea($model,'cp_action_reason',array('size'=>60,'maxlength'=>140,'value'=>$reason)); ?>
		<?php echo $form->error($model,'cp_action_reason'); ?>
	</div>
	
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->