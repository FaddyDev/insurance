<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'investigator-form',
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

	<?php echo $form->hiddenField($model,'fk_investigator_provider_id',array('value'=>Yii::app()->getModule("provider")->providerUser->provider_id)); ?>
	<!--<div class="row">
		<?php //echo $form->labelEx($model,'fk_investigator_provider_id'); ?>
		<?php //echo $form->textField($model,'fk_investigator_provider_id'); ?>
		<?php //echo $form->error($model,'fk_investigator_provider_id'); ?>
	</div>-->

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_idno'); ?>
		<?php echo $form->textField($model,'investigator_idno'); ?>
		<?php echo $form->error($model,'investigator_idno'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_full_name'); ?>
		<?php echo $form->textField($model,'investigator_full_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'investigator_full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_email'); ?>
		<?php echo $form->textField($model,'investigator_email',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'investigator_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_username'); ?>
		<?php echo $form->textField($model,'investigator_username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'investigator_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'investigator_password'); ?>
		<?php echo $form->passwordField($model,'investigator_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'investigator_password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Add' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->