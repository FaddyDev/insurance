<?php
/* @var $this PolicyController */
/* @var $model Policy */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'policy-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
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

	<?php echo $form->hiddenField($model,'fk_policy_provider_id',array('value'=>Yii::app()->getModule("provider")->providerUser->provider_id)); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'fk_policy_provider_id'); ?>
		<?php //echo $form->textField($model,'fk_policy_provider_id'); ?>
		<?php //echo $form->error($model,'fk_policy_provider_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'policy_cover_type'); ?>
		<?php //echo $form->textField($model,'policy_cover_type',array('size'=>30,'maxlength'=>30)); ?>
        <?php echo $form->dropDownList($model,'policy_cover_type',array(''=>'Select Cover','Life'=>'Life',
		'Car'=>'Car','Imarisha'=>'Imarisha','Elimisha'=>'Elimisha','Pumzisha'=>'Pumzisha','Savings'=>'Savings',
		'Busy Boda'=>'Busy Boda')); ?>
		<?php echo $form->error($model,'policy_cover_type'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_price'); ?>
		<?php echo $form->textField($model,'policy_price',array('placeholder'=>'in Ksh for others, or % for car', 'onkeypress'=>'return numsonly(event);')); ?>
		<?php echo $form->error($model,'policy_price'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_period'); ?>
		<?php echo $form->textField($model,'policy_period',array('placeholder'=>'in months', 'onkeypress'=>'return numsonly(event);')); ?>
		<?php echo $form->error($model,'policy_period'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'policy_description'); ?>
		<?php echo $form->textArea($model,'policy_description',array('size'=>60,'maxlength'=>140,'placeholder'=>'Short description of the policy')); ?>
		<?php echo $form->error($model,'policy_description'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
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