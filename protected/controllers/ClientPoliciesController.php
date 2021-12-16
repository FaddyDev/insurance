<?php

class ClientPoliciesController extends Controller
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
				'actions'=>array('index','view','expiryChecker'),
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
		$model=new ClientPolicies;
		$policyID = Yii::app()->getRequest()->getParam('id');
		$thePolicy = Policy::model()->findByPk($policyID);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientPolicies']))
		{
			$model->attributes=$_POST['ClientPolicies'];
			$cp_period = $_POST['ClientPolicies']['cp_policy_period'];
			$policy_count = $_POST['ClientPolicies']['cp_policy_count'];

			//Let's calculate the amount to be paid
			//we use the policy's price and period to get price per month, then multiply by the 
			//period set by the client. Then we round to 2db - currency - then multiply by poliy count
			$policy_price = $thePolicy->policy_price;
			$policy_period = $thePolicy->policy_period;
			$amount = (round( (($policy_price/$policy_period)*$cp_period) ,2))*$policy_count;
			if($thePolicy->policy_cover_type == 'Car'){$amount = 0.00;}//for car, we compute amount when the vehicle data is entered
			$model->cp_policy_amount = $amount;

			//get the expiry period as x months from now, x being the period entered by the client
			$expiry_date = (new DateTime())->add(new DateInterval('P'.$cp_period.'M'))->format('Y-m-d H:i:s');
			$model->cp_policy_expiry_date = $expiry_date;
			$model->cp_approval = 0;
			$model->cp_status = 'Pending Approval';
			$model->cp_paid = 0;

			if($model->save()){
				$_SESSION['status']='success'; $success='Request sent! Wait for the provider\'s 
				approval before paying. You\'ll receive email notification'; 
				if($thePolicy->policy_cover_type == 'Car'){$success .= '<br>However, you must input car details for 
					amount to be computed. Go to your policies then click view more icon against this policy.';}
				$_SESSION['response'] = $success;
				$this->redirect(array('view','id'=>$model->pk_cp_id));
			}
			else{
				$_SESSION['status']='fail'; $_SESSION['response']='Failed! Try again!';
				//var_dump($model->getErrors());exit;
				$this->redirect(Yii::app()->request->urlReferrer);
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'thePolicy'=>$thePolicy,
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
		$thePolicy = Policy::model()->findByPk($model->fk_cp_policy_id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClientPolicies']))
		{
			$model->attributes=$_POST['ClientPolicies'];
			$cp_period = $_POST['ClientPolicies']['cp_policy_period'];
			$policy_count = $_POST['ClientPolicies']['cp_policy_count'];

			//Let's calculate the amount to be paid
			//we use the policy's price and period to get price per month, then multiply by the 
			//period set by the client. Then we round to 2db - currency - then multiply by poliy count
			$policy_price = $thePolicy->policy_price;
			$policy_period = $thePolicy->policy_period;
			$amount = (round( (($policy_price/$policy_period)*$cp_period) ,2))*$policy_count;
			$model->cp_policy_amount = $amount;

			//get the expiry period as x months from now, x being the period entered by the client
			$expiry_date = (new DateTime())->add(new DateInterval('P'.$cp_period.'M'))->format('Y-m-d H:i:s');
			$model->cp_policy_expiry_date = $expiry_date;

			if($model->save()){
				$_SESSION['status']='success'; $_SESSION['response']='Update successful'; 
				$this->redirect(array('view','id'=>$model->pk_cp_id));
			}
			else{
				$_SESSION['status']='fail'; $_SESSION['response']='Failed! Try again!';
				var_dump($model->getErrors());exit;
				$this->redirect(Yii::app()->request->urlReferrer);
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'thePolicy'=>$thePolicy,
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
		$dataProvider=new CActiveDataProvider('ClientPolicies');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClientPolicies('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClientPolicies']))
			$model->attributes=$_GET['ClientPolicies'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	//checks and emails every client whose policy is about to or has expired
	
	public function actionExpiryChecker()
	{
		$ClientPolicy=ClientPolicies::model()->findAll();
		foreach($ClientPolicy as $cp)
		{
			$expiry_date = new DateTime($cp->cp_policy_expiry_date);
			//$now = (new DateTime())->format('Y-m-d H:i:s');
			$now = new DateTime('now');
			
			//for mail
			$recipientName = $cp->fkCpClient->client_fname." ".$cp->fkCpClient->client_lname;
			$recipientEmail = $cp->fkCpClient->client_email;
			$senderName = $cp->fkCpPolicy->fkPolicyProvider->provider_full_name;
			$senderEmail = $cp->fkCpPolicy->fkPolicyProvider->provider_email;
			$id = $cp->pk_cp_id;

			$interval = $expiry_date->diff($now);
			$days = (int)$interval->format('%a'); //2
			$sign = (string)$interval->format('%R'); //+,- 
			//the sign should always be negative because expiry date should be later than today
			if($sign === '-' && $days <= 7)
			{
				//expires in the next 'days' days
				$message = 'Dear '.$recipientName.',<br><p>Your policy of ID <strong>'.$id.'</strong> is due to expire 
				in <strong>'.$days.'</strong> days. The expiry date is <strong>'.$expiry_date->format('Y-m-d H:i:s').'</strong>. Make payments ASAP.</p>
				<p>Thank you for the continued loyalty to our services.</p>
				<p><em>Regards</em>,<br>'.$senderName.'</p>';
				$this->sendmail($id, $message, $senderEmail, $senderName, $recipientEmail, $recipientName);
			}
			if($sign === '+')
			{
				//has expired
				$message = 'Dear '.$recipientName.',<br><p>Your policy of ID <strong>'.$id.'</strong> expired on <strong>'.$expiry_date->format('Y-m-d H:i:s').'</strong>. Make payments ASAP.</p>
				<p>Thank you for the continued loyalty to our services.</p>
				<p><em>Regards</em>,<br>'.$senderName.'</p>';
				$this->sendmail($id, $message, $senderEmail, $senderName, $recipientEmail, $recipientName);
			}
		}
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ClientPolicies the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ClientPolicies::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ClientPolicies $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='client-policies-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	private function sendmail($policyID, $message, $senderEmail, $senderName, $recipientEmail, $recipientName){
		$emailSubject = 'Policy Expiry Notice - ID: '.$policyID;		
		$emailBody   = $message;
		
		$folder = Yii::getPathOfAlias('ext.PHPMailer');
		include($folder.'/PHPMailerAutoload.php');
		
		$mail = new PHPMailer;		
		//$mail->SMTPDebug = 3;                               // Enable verbose debug output
		
		$mail->isSMTP();                                      // Set mailer to use SMTP
		$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
		$mail->SMTPAuth = true;                               // Enable SMTP authentication
		$mail->Username = 'kelvinmwaniki048@gmail.com';                 // SMTP username
		$mail->Password = 'Howellmc38';                           // SMTP password
		$mail->SMTPSecure = 'tls';                            // Enable TLS encryption, `ssl` also accepted
		$mail->Port = 587;                                    // TCP port to connect to
		//$mail->SMTPDebug = 2;
		
		$mail->setFrom('kelvinmwaniki048@gmail.com', 'Insurance Supermarket');
		$mail->AddAddress($recipientEmail, $recipientName);		
		
		$mail->addReplyTo($senderEmail, $senderName);		
				
		$mail->isHTML(true);                                  // Set email format to HTML
		$mail->SMTPOptions = array(
		'ssl' => array(
		'verify_peer' => false,
		'verify_peer_name' => false,
		'allow_self_signed' => true
		)
		);	
				
		$mail->Subject = $emailSubject;
		$mail->Body    = $emailBody;
		
		$sent = true;
		
		//$mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
		
		if(!$mail->send()) {//this code will execute if the email is NOT sent
			//echo 'Message could not be sent.';
			//echo 'Mailer Error: ' . $mail->ErrorInfo;
			$sent=false;
		} 
		else {//this code will execute once the mail is sent
			$sent=true;
		
		//$respMsg="An email With a <strong><font color='red'>RESET KEY</font></strong> has been sent to: <br><font color='red'><strong>".$firstCharacter."******".$lastCharacter.$suffixdisp."</strong></font><br>";
		}
		return $sent;
	}
}
