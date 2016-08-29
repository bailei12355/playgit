<?php
namespace Admin\Controller;
use Admin\Controller\AdminController;
class IndexController extends AdminController {
    public function index(){
    	$this->display();
    }
    	
    	
    public function logout()
	{
		//清空session
		session(null);
		//跳转
		$this->redirect('Admin/login');
	}
}