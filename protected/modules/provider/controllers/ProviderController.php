<?php

class ProviderController extends Controller
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
	/*public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','create'),
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
	}*/


	public function accessRules()
	{
		return array(
            array('allow',
                'actions'=>array('update'),
                'expression' => array($this,'allowAccess')
            ),
            array('allow',
                'actions'=>array('create'),
				'users'=>array('*')
            ),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}


    public function allowAccess(){

        if(!Yii::app()->getModule("provider")->providerUser->isGuest){
            return true;
        }

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
		$model=new Provider;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Provider']))
		{
			$model->attributes=$_POST['Provider'];
			$upload = CUploadedFile::getInstance($model,'provider_logo');
			$logo = str_replace(' ','_',$_POST['Provider']['provider_full_name']).'_provider_logo_'.time().'.'.$upload->getExtensionName();;
			$path=str_replace('\protected','',Yii::app()->basePath).'\\images\\logos\\'.$logo;
			$upload->saveAs($path);
			$model->provider_logo = $logo;
			if($model->save()){
				//$this->redirect(array('view','id'=>$model->pk_provider_id));
				$_SESSION['status']='success'; $_SESSION['response']='Signup successful! Login now.'; 
				$this->redirect(array('default/login'));
			}
			else{
				$_SESSION['status']='fail'; $_SESSION['response']='Failed! Try again!';
				$this->redirect(Yii::app()->request->urlReferrer);
			}
		}

		$this->render('create',array(
			'model'=>$model,
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
		$old_logo = $model->provider_logo;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Provider']))
		{
			$model->attributes=$_POST['Provider'];
			$upload = CUploadedFile::getInstance($model,'provider_logo');
			if(null !== $upload) //if an image was uploaded
			{				
				$logo = str_replace(' ','_',$_POST['Provider']['provider_full_name']).'_provider_logo_'.time().'.'.$upload->getExtensionName();;
				$path=str_replace('\protected','',Yii::app()->basePath).'\\images\\logos\\'.$logo;
				$upload->saveAs($path);
				$model->provider_logo = $logo;
				//delete the old one t save on space
				if(null !== $old_logo){
					unlink(str_replace('\protected','',Yii::app()->basePath).'\\images\\logos\\'.$old_logo);
				}
			}
			else{$model->provider_logo=$old_logo;}
			/*$model->provider_full_name=$_POST['Provider']['provider_full_name'];
			$model->provider_email=$_POST['Provider']['provider_email'];
			$model->provider_username=$_POST['Provider']['provider_username'];
			$model->provider_password=$_POST['Provider']['provider_password'];*/

			if($model->save(false)){
				//$this->redirect(array('view','id'=>$model->pk_provider_id));
				$_SESSION['status']='success'; $_SESSION['response']='Profile updated successfully!'; 
				$this->redirect(array('default/index'));
			}
			else{
				$_SESSION['status']='fail'; $_SESSION['response']='Failed! Try again!';
				//var_dump($model->getErrors());exit;
				$this->redirect(Yii::app()->request->urlReferrer);
			}
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
		$dataProvider=new CActiveDataProvider('Provider');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Provider('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Provider']))
			$model->attributes=$_GET['Provider'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Provider the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Provider::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Provider $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='provider-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
