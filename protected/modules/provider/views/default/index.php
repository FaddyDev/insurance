<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Provider Dashboard</h1>

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
<p>
<?php  
$img = Yii::app()->baseUrl.'/images/no-image.png'; 
if(null !== $model->provider_logo){
$img = Yii::app()->baseUrl.'/images/logos/'.$model->provider_logo;}
echo CHtml::link("<img class='img-thumbnail' title='Click to update profile' src='".$img."'>",array("provider/update/id/".$model->pk_provider_id)); ?>
</p>
<p>
Welcome to your dashboard, <?php echo '<strong>'.$model->provider_full_name.'</strong>.'; ?></p>
<p>
To update profile and change username or password, click the image above.
</p>