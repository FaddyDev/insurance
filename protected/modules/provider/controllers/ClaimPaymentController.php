<?php

class ClaimPaymentController extends Controller
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
	 *//*
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
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
                'actions'=>array('update','admin','view','create'),
                'expression' => array($this,'allowAccess')
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
		$model=new ClaimPayment;
		$claimID = Yii::app()->getRequest()->getParam('id');
		$theClaim=Claims::model()->findByPk($claimID);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClaimPayment']))
		{
			//for mail
			$recipientName = $theClaim->fkClaimClientPolicy->fkCpClient->client_fname." ".$theClaim->fkClaimClientPolicy->fkCpClient->client_lname;
			$recipientEmail = $theClaim->fkClaimClientPolicy->fkCpClient->client_email;
			$senderName = $theClaim->fkClaimClientPolicy->fkCpPolicy->fkPolicyProvider->provider_full_name;
			$senderEmail = $theClaim->fkClaimClientPolicy->fkCpPolicy->fkPolicyProvider->provider_email;

			$model->attributes=$_POST['ClaimPayment'];
			$model->claim_payment_datetime = (new DateTime())->format('Y-m-d H:i:s');
			//more for email
			$amount = $model->claim_payment_amount;
			$receiptNo = $model->claim_payment_receipt_no;
			if($model->save()){				
				//email client				
				$message = 'Dear '.$recipientName.',<br><p>There is development on your claim of ID <strong>'.$claimID.'</strong>. 
				You have been paid  <strong> Ksh. '.$amount.'</strong>. The receipt number is : <strong>'.$receiptNo.'</strong>
				while the payment ID is <strong>'.$model->pk_claim_payment_id.'</strong>.</p>
				<p>Thank you for the continued loyalty to our services.</p>
				<p><em>Regards</em>,<br>'.$senderName.'</p>';
				if($this->sendmail($claimID,$message, $senderEmail, $senderName, $recipientEmail, $recipientName)){
				$_SESSION['status']='success'; 
				$_SESSION['response']='Claim payment successful!';}
				else{$_SESSION['status']='fail'; 
					$_SESSION['response']='Claim payment successful, but there were errors sending the emal update to client!';}
				$this->redirect(array('view','id'=>$model->pk_claim_payment_id));
			}
		}

		$this->render('create',array(
			'model'=>$model,
			'theClaim'=>$theClaim,
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
		$claimID = $model->fk_claim_payment_claim_id;
		$theClaim=Claims::model()->findByPk($claimID);
		$init_amount = $model->claim_payment_amount;
		$init_receiptNo = $model->claim_payment_receipt_no;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['ClaimPayment']))
		{
			//for mail
			$recipientName = $theClaim->fkClaimClientPolicy->fkCpClient->client_fname." ".$theClaim->fkClaimClientPolicy->fkCpClient->client_lname;
			$recipientEmail = $theClaim->fkClaimClientPolicy->fkCpClient->client_email;
			$senderName = $theClaim->fkClaimClientPolicy->fkCpPolicy->fkPolicyProvider->provider_full_name;
			$senderEmail = $theClaim->fkClaimClientPolicy->fkCpPolicy->fkPolicyProvider->provider_email;

			$model->attributes=$_POST['ClaimPayment'];
			$model->claim_payment_datetime = (new DateTime())->format('Y-m-d H:i:s');
			//more for email
			$amount = $model->claim_payment_amount;
			$receiptNo = $model->claim_payment_receipt_no;
			if($model->save()){				
				//email client
				if($init_amount != $amount || $init_receiptNo != $receiptNo){				
				$message = 'Dear '.$recipientName.',<br><p>There is a payment update on your claim of ID <strong>'.$claimID.'</strong>. 
				The payment now is  <strong> Ksh. '.$amount.'</strong>. The receipt number is : <strong>'.$receiptNo.'</strong>
				while the payment ID is <strong>'.$model->pk_claim_payment_id.'</strong>.</p>
				<p>Thank you for the continued loyalty to our services.</p>
				<p><em>Regards</em>,<br>'.$senderName.'</p>';
				if($this->sendmail($claimID,$message, $senderEmail, $senderName, $recipientEmail, $recipientName)){
				$_SESSION['status']='success'; 
				$_SESSION['response']='Claim payment successful!';}
				else{$_SESSION['status']='fail'; 
					$_SESSION['response']='Claim payment successful, but there were errors sending the emal update to client!';}
				}else{$_SESSION['status']='success'; $_SESSION['response']='Claim payment updated successfully!';}
				$this->redirect(array('view','id'=>$model->pk_claim_payment_id));
			}
		}

		$this->render('update',array(
			'model'=>$model,
			'theClaim'=>$theClaim,
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
		$dataProvider=new CActiveDataProvider('ClaimPayment');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new ClaimPayment('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['ClaimPayment']))
			$model->attributes=$_GET['ClaimPayment'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return ClaimPayment the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=ClaimPayment::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param ClaimPayment $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='claim-payment-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
	private function sendmail($claimID, $message, $senderEmail, $senderName, $recipientEmail, $recipientName){
		$emailSubject = 'Claim Payment - ID: '.$claimID;		
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