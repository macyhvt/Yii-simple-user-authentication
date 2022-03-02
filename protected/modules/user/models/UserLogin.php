<?php
class UserLogin extends CActiveRecord
{
	public function tableName()
	{
		return 'user';
	}
	public function rules()
	{
		return array(
			array('full_name, username, email, password, added_date', 'required'),
			array('full_name, username, email', 'length', 'max'=>100),
			array('password', 'length', 'max'=>32),
			array('role', 'length', 'max'=>13),
			array('id, full_name, username, email, password, role, added_date', 'safe', 'on'=>'search'),
		);
	}
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'full_name' => 'Full Name',
			'username' => 'Username',
			'email' => 'Email',
			'password' => 'Password',
			'role' => 'Role',
			'added_date' => 'Added Date',
		);
	}
	public function search()
	{
		$criteria=new CDbCriteria;
		$criteria->compare('full_name',$this->full_name,true);
		$criteria->compare('username',$this->username,true);
		$criteria->compare('email',$this->email,true);
		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
	public function login()
    {
        if($this->_identity === null) {		
			$this->_identity = new UserAuthenticity($this->email,$this->password);
			$this->_identity->authenticate();
        }
    }
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
