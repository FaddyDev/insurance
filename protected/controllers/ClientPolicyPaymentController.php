<?php

class ClientPolicyPaymentController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','admin'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new ClientPolicyPayment;
		$clientPolicyID = Yii::app()->getRequest()->getParam('id');
		$theClientPolicy = ClientPolicies::model()->findByPk($clientPolicyID);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientPolicyPayment']))
		{
			$model->attributes=$_POST['ClientPolicyPayment'];
			$upload = CUploadedFile::getInstance($model,'policy_payment_receipt_pic');
			if(null !== $upload) //if an image was uploaded
			{				
				$logo = str_replace(' ','_',$_POST['ClientPolicyPayment']['policy_payment_receipt_no']).'_policy_payment_receipt_pic_'.time().'.'.$upload->getExtensionName();;
				$path=str_replace('\protected','',Yii::app()->basePath).'\\images\\policy payments\\'.$logo;
				$upload->saveAs($path);
				$model->policy_payment_receipt_pic = $logo;
			}
			$model->policy_payment_datetime = (new DateTime())->format('Y-m-d H:i:s');
			if($model->save()){
				$theClientPolicy->cp_paid=1;
				$theClientPolicy->cp_status = 'Active';
				$theClientPolicy->save();
				$_SESSION['status']='success'; $_SESSION['response']='Payment successful'; 
				$this->redirect(array('clientPolicies/view','id'=>$clientPolicyID));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'theClientPolicy'=>$theClientPolicy,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientPolicyPayment']))
		{
			$model->attributes=$_POST['ClientPolicyPayment'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->pk_policy_payment_id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('ClientPolicyPayment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClientPolicyPayment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientPolicyPayment']))
			$model->attributes=$_GET['ClientPolicyPayment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ClientPolicyPayment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ClientPolicyPayment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ClientPolicyPayment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-policy-payment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
