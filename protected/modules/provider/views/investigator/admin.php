<?php
/* @var $this InvestigatorController */
/* @var $model Investigator */

$this->breadcrumbs=array(
	'Investigators'=>array('index'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Investigator', 'url'=>array('index')),
	array('label'=>'Add Investigator', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#investigator-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Investigators</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->
<p>
	The following are claim investigators in your company.
</p>

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div> search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'investigator-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'pk_investigator_id',
		array(
			'header'=>'#',
			'value'=>'CHtml::label($row+1+($this->grid->dataProvider->pagination->currentPage
			* $this->grid->dataProvider->pagination->pageSize),"",array("size" =>2))',
			'type'=>'raw',
			),
		//'fk_investigator_provider_id',
		'investigator_idno',
		'investigator_full_name',
		'investigator_email',
		'investigator_username',
		/*
		'investigator_password',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
