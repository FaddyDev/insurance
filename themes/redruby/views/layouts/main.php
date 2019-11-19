<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
		<div id="logo"><?php echo CHtml::encode(Yii::app()->name); ?></div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home', 'url'=>array('/site/index')),
				array('label'=>'My Profile', 'url'=>array('default/index'), 'visible'=>!Yii::app()->getModule('provider')->providerUser->isGuest),
				array('label'=>'Policies', 'url'=>array('policy/admin')),
				array('label'=>'Clients', 'url'=>array('clients/admin')),
				array('label'=>'Client Policies', 'url'=>array('clientPolicies/admin')),
				array('label'=>'Claims', 'url'=>array('claims/admin')),
				array('label'=>'Investigators', 'url'=>array('investigator/admin')),
				array('label'=>'Sign Up', 'url'=>array('provider/create'), 'visible'=>Yii::app()->getModule('provider')->providerUser->isGuest),
				array('label'=>'Login', 'url'=>array('default/login'), 'visible'=>Yii::app()->getModule('provider')->providerUser->isGuest),
				array('label'=>'Logout ('.Yii::app()->getModule('provider')->providerUser->id.')', 'url'=>array('default/logout'), 'visible'=>!Yii::app()->getModule('provider')->providerUser->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->

	<?php $this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	)); ?><!-- breadcrumbs -->

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->


<script>
	<?php 
	Yii::app()->clientScript->registerCoreScript('jquery');
	?>
	//executing the expiryChecker checker query after every 1 hour
	(function expiryChecker(){
		$.ajax({
	url: "<?php echo Yii::app()->createUrl('clientPolicies/expiryChecker'); ?>",
	type: "get",
	dataType: 'json',
	// success: function (response) {
	//    var d = new Date();
	//    console.log(response+': '+d);
	// },
	error: function (data) {
		setTimeout(expiryChecker, 60000);//3600000 - this for one hour,current val is for 1 min
		}
	});
	setTimeout(expiryChecker, 60000)//3600000
	})();
</script>

</body>
</html>