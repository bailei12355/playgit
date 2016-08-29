<?php
namespace Admin\Controller;
use Think\Controller;
// use Org\Util\Rbac;

/**
* 后台登录
*/
class LoginController extends Controller
{
	public function index()
	{
	$this->display('Login/index');
		
	}
	
	public function login()
	{
		$admin['adm_name'] = $_POST['adminname'];
		$admin['adm_pwd'] = md5($_POST['adminpwd']);
		// var_dump($admin);
		$aduser = M('admin')->where($admin)->select();
		// p($aduser);die;
		// 
		if (empty($aduser)) {
			$this->error('用户名或密码错误!',U('Admin/login/index'));
	    	exit;
		} else {
			$aduser=$aduser[0];
			if ($aduser['lock']) {
				$this->error('用户已经被锁定,请联系官方客服');
			}
			session(C('USER_AUTH_KEY'),$aduser['adm_id']);  
			session('name',$aduser['adm_name']);  
			//如果用户是超级管理员，则可以进行一切操作 
			// p(session('name')); 
			// p(C('RBAC_SUPERADMIN'));
			if (session('name')==C('RBAC_SUPERADMIN')) {  
			    session(C('ADMIN_AUTH_KEY'),true);  
			}
			$rbac=new \Org\Util\Rbac();
			// 取出用户权限信息  
			$rbac::saveAccessList($aduser['adm_id']); 
			// \Org\Util\Rbac::saveAccessList($aduser['adm_id']);
			// session('admin',$aduser);
			// unset($_SESSION['admin']['adm_pwd']);
			// unset($_SESSION['admin']['adm_email']);
			// // unset($date['login_count']);
			// unset($_SESSION['admin']['status']);
			// use Think\Library\Org\Util\Rbac.class.php;
			// import("ORG.Util.Rbac");
			  
			// p($_SESSION);
			// die;
			$tyu = session();
			// var_dump($tyu);
			// exit;
			$this->success('登录成功',U('Admin/Index/index'));
		}
	}
	
	// public function login(){
        
 //        $name = I('post.adminname');
 //        $passwd = md5(I('post.adminpwd'));
 //        $info = M('admin')->where(array('adm_name'=>$name))->find();
 //        if(empty($info)){
 //            $this->error('用户不存在');
 //        }
 //        if($info['adm_pwd'] != $passwd){
 //            $this->error('用户名密码错误');
 //        }
 //        session('id',$info['adm_id']);
 //        session('name',$info['adm_name']);
 //        if($name == C('ADMIN_AUTH_KEY')){
 //            session(C('ADMIN_AUTH_KEY'),$name);
 //        }else{
 //            \Org\Util\Rbac::saveAccessList($info['adm_id']);
 //            p($_SESSION);die;
 //        }
 //        $this->redirect('Admin/Index/index', '', 1, '页面跳转中...');
 //    }
	

}