<?php
class UserAuthenticity extends CBaseUserIdentity
{
    public function __construct($email, $password)
    {
            $this->email = $email;
            $this->password = $password;
	}

    public function authenticate()
    {   		
        $record = UserLogin::model()->findByAttributes(array('email' => $this->email));
        if($record === null)
		{	         
			$this->errorCode=self::ERROR_USERNAME_INVALID;
        }
		else
        {
            $this->_id=$record->id;			
			$this->setState('name', $record->full_name);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }
}
?>