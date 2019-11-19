<?php

/**
 * UserIdentity represents the data needed to identity a user.
 * It contains the authentication method that checks if the provided
 * data can identity the user.
 */
class UserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
	public function authenticate()
	{		
		$user = Clients::model()->findByAttributes(array('client_username'=>$this->username));
		if ($user===null) { // No user found!
	    $this->errorCode=self::ERROR_USERNAME_INVALID;
		} 
		else if ($user->client_password !== $this->password) { // Invalid password! crypt($this->password, $user->client_password)
	    $this->errorCode=self::ERROR_PASSWORD_INVALID;
		} 
		else { // Okay!
	    	$this->setState('client_id',$user->pk_client_id);
    		$this->errorCode=self::ERROR_NONE;
		}
		return !$this->errorCode;

		$identity->authenticate();
		switch($identity->errorCode)
		{
			case UserIdentity::ERROR_NONE:
				$duration=$this->rememberMe ? 3600*24*1 : 0; // 1 day
				Yii::app()->user->login($identity,$duration);
				break;
			case UserIdentity::ERROR_USERNAME_INVALID:
				$this->addError('username','Username is incorrect.');
				break;
			default: // UserIdentity::ERROR_PASSWORD_INVALID
				$this->addError('password','Password is incorrect.');
				break;
		}
	}
}