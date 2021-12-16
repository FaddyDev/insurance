<?php
/* @var $this PolicyController */
/* @var $model Policy */

$this->breadcrumbs=array(
	'Policies'=>array('admin'),
	'Manage',
);

$this->menu=array(
	//array('label'=>'List Policy', 'url'=>array('index')),
	array('label'=>'Create Policy', 'url'=>array('create')),
);

/*Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#policy-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");*/
?>

<h1>Manage Policies</h1>

<!--<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>-->

<?php //echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<!--<div class="search-form" style="display:none">
<?php /*$this->renderPartial('_search',array(
	'model'=>$model,
));*/ ?>
</div> search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'policy-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'pk_policy_id',
		array(
			'header'=>'#',
			'value'=>'CHtml::label($row+1+($this->grid->dataProvider->pagination->currentPage
			* $this->grid->dataProvider->pagination->pageSize),"",array("size" =>2))',
			'type'=>'raw',
			),
		//'fk_policy_provider_id',
		'policy_cover_type',
		//'policy_price',
		array(
			'name'=>'policy_price',
			//'header'=>'Price (Ksh)',
			'value'=>'$data->policy_cover_type=="Car"? $data->policy_price."%" : "Ksh ".$data->policy_price',
			),
		//'policy_period',
		array(
			'name'=>'policy_period',
			'header'=>'Period (months)',
			'value'=>'$data->policy_period',
			),
		'policy_description',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
