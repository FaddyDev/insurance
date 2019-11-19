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

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'pk_cp_id'); ?>
		<?php //echo $form->textField($model,'pk_cp_id'); ?>
		<?php //echo $form->error($model,'pk_cp_id'); ?>
	</div>-->

	<?php echo $form->hiddenField($model,'fk_cp_client_id',array('value'=>Yii::app()->user->client_id)); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'fk_cp_client_id'); ?>
		<?php //echo $form->textField($model,'fk_cp_client_id'); ?>
		<?php //echo $form->error($model,'fk_cp_client_id'); ?>
	</div>-->

	<?php echo $form->hiddenField($model,'fk_cp_policy_id',array('value'=>$policy_id)); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'fk_cp_policy_id'); ?>
		<?php //echo $form->textField($model,'fk_cp_policy_id'); ?>
		<?php //echo $form->error($model,'fk_cp_policy_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'cp_policy_period'); ?>
		<?php echo $form->textField($model,'cp_policy_period',array('placeholder'=>'In months', 'onkeypress'=>'return numsonly(event);')); ?>
		<?php echo $form->error($model,'cp_policy_period'); ?>
	</div>

	<!--<div class="row">
		<?php //echo $form->labelEx($model,'cp_policy_expiry_date'); ?>
		<?php //echo $form->textField($model,'cp_policy_expiry_date'); ?>
		<?php //echo $form->error($model,'cp_policy_expiry_date'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'cp_policy_count'); ?>
		<?php echo $form->textField($model,'cp_policy_count',array('placeholder'=>'Number of policies', 'onkeypress'=>'return numsonly(event);')); ?>
		<?php echo $form->error($model,'cp_policy_count'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Buy' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->

<script>
	function numsonly(e){
		var unicode=e.charCode? e.charCode : e.keyCode
		if (unicode!=8 & unicode!=9 & unicode!=46 & unicode!=37 & unicode!=39 ){ //if the key isn\'t the backspace, tab, delete,left and right arrow keys (which we should allow)
			if (unicode<48||unicode>57) //if not a number
			{
				alert("Invalid entry! You can only input numbers");
				return false //disable key press
			}
		}
	}
</script>