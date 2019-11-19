<?php
/* @var $this ProviderController */
/* @var $model Provider */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'provider-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
	'htmlOptions'=>array('enctype'=>'multipart/form-data',),
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

	<div class="row">
		<?php echo $form->labelEx($model,'provider_full_name'); ?>
		<?php echo $form->textField($model,'provider_full_name',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'provider_full_name'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_email'); ?>
		<?php echo $form->textField($model,'provider_email',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'provider_email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_logo').'<br>'; 
		$img = Yii::app()->baseUrl.'/images/logos/'.$model->provider_logo;
          echo '<img src="'.$img.'" width="10%"><br>';
		?>
		<?php echo $form->fileField($model,'provider_logo',array('size'=>60,'maxlength'=>100,'accept'=>'.jpg,.png,.jpeg')); ?>
		<?php echo $form->error($model,'provider_logo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_username'); ?>
		<?php echo $form->textField($model,'provider_username',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'provider_username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'provider_password'); ?>
		<?php echo $form->passwordField($model,'provider_password',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'provider_password'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->