<?php

class DashboardController extends Controller
{
	public function filters(){
		return array(
			'accessControl',
			'postOnly + delete',
		);
	}
	public function accessRules(){
		if( Yii::app()->user->getState('role')=="Administrator")
		{
			 $arr =array('index','editor','visitor');   // give all access to Administrator
		}elseif(Yii::app()->user->getState('role')=="Manager")
		{
			$arr =array('manager','editor','visitor');   // give all access to Visitor
		}elseif(Yii::app()->user->getState('role')=="Editor")
		{
			$arr =array('editor');   // give all access to Editor
		}elseif(Yii::app()->user->getState('role')=="Visitor")
		{
			$arr =array('visitor');   // give all access to Visitor
		}else
		{
			$arr = $this->redirect(array('/user/uaccess'));
		}
			
		return array(                   
			array('allow', 
						'actions'=>$arr,
						'deniedCallback' => array($this, 'goToLogin'),
						'users'=>array('@'),
					),
											
					array('deny',  // deny all users
					'deniedCallback' => array($this, 'goToLogin'),
							'users'=>array('*'),
					),
			);
	}
	public function goToLogin()
	{
			$this->render('uacess');
	}
	public function actionUacess()
	{
			$this->render('uacess');
	}
	
	public function actionIndex()
	{
		$model=new User;
        $this->render('index', array(
			'model'=>$model,
		));
	}
	public function action()
	{
		$model=new user('search');
        $this->render('index', array(
			'model'=>$model,		
		));
	}
	public function actionEditor()
	{
		$model=new User;
		$this->render('Editor', array(
			'model'=>$model,
		));
	}
	public function actionVisitor()
	{
		$model=new User;
		$this->render('Visitor', array(
			'model'=>$model,
		));
	}
}