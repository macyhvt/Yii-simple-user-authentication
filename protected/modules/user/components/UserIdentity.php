<?php
class UserIdentity extends CUserIdentity
{
	public function authenticate()
	{
		$users=array(
			// Dummy:- username => password
			'demo'=>'demo',
			'admin'=>'admin',
		);
		if(!isset($users[$this->email]))
			$this->errorCode=self::ERROR_USERNAME_INVALID;
		else if($users[$this->email]!==$this->password)
			$this->errorCode=self::ERROR_PASSWORD_INVALID;

		else
			$this->errorCode=self::ERROR_NONE;
		return !$this->errorCode;
	}
}