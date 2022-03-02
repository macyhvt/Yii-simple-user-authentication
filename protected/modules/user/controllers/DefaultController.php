<?php

class DefaultController extends Controller
{
	public $layout='//layouts/column1';
	public function actionIndex()
	{
		$model = new UserLogin;		
		if(isset($_POST['ajax']) && $_POST['ajax']==='UserLogin')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		if(isset($_POST['UserLogin']))
		{			
			$model->attributes=$_POST['UserLogin'];
			if($model->login()) {				
					$this->redirect(array('/user/dashboard/index'));
				}
				else{
					$this->redirect(array('/user/dashboard/uacess'));	
				}	
			}	else{
				Yii::app()->user->setFlash('errorlogin',"Incorrect Email or Password.");
				$this->redirect(array('/'));
			}
		}		
		$this->render('login', array('model'=>$model));
	}
}