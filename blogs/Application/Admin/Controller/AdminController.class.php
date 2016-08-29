<?php 
namespace Admin\Controller;

use Think\Controller;

//公共的控制器类
class AdminController extends Controller
{

	//初始化的方法
	public function _initialize()
	{

		//判断session是否存在
		if(!isset($_SESSION[C('USER_AUTH_KEY')])){
			//跳转到 登陆页
			$this->redirect('Admin/login/index');
		}
		// echo ACTION_NAME;;
		// echo MODULE_NAME;die();
		$notAuth = in_array(MODULE_NAME, explode(',', C('NOT_AUTH_MODULE'))) || in_array(ACTION_NAME, explode(',', C('NOT_AUTH_ACTION')));
		if (C('USER_AUTH_ON') && !$notAuth) {
			$rbac=new \Org\Util\Rbac();
			// 取出用户权限信息  
			$rbac::AccessDecision(GROUP_NAME)  || $this->error('没有权限');
		}
	}

}

 