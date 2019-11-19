<?php
/* @var $this ClaimsController */
/* @var $model Claims */

$this->breadcrumbs=array(
	'Claims'=>array('index'),
	'Manage',
);

/*$this->menu=array(
	array('label'=>'List Claims', 'url'=>array('index')),
	array('label'=>'Create Claims', 'url'=>array('create')),
);*/

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#claims-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Claims</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<p>
	Claims made on policies provided by your organization.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div> search-form -->


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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'claims-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'pk_claim_id',
		'fk_claim_client_policy_id',
		'claim_investigator_report',
		'claim_investigator_post_datetime',
		'claim_post_datetime',
		'claim_final_verdict',
		/*
		'claim_final_verdict_post_datetime',
		*/
		'claim_status',
		array(
			'class'=>'CButtonColumn',
			'header'=>'Respond',
			'template'=>'{update}',
		),
	),
)); ?>
