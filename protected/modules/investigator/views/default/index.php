<?php
/* @var $this DefaultController */

$this->breadcrumbs=array(
	$this->module->id,
);
?>
<h1>Investigator Dashboard</h1>

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
if(null !== $model->investigator_photo){
$img = Yii::app()->baseUrl.'/images/logos/'.$model->investigator_photo;}
echo CHtml::link("<img class='img-thumbnail' title='Click to update profile' src='".$img."'>",array("investigator/update/id/".$model->pk_investigator_id)); ?>
</p>
<p>
Welcome to your dashboard, <?php echo '<strong>'.$model->investigator_full_name.'</strong>.'; ?></p>
<p>
To update profile and change username or password, click the image above.
</p>