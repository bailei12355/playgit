<?php
namespace Home\Controller;
use Think\Controller;


/**
* 前台登录
*/
class LoginController extends Controller
{
	public function index()
	{
		$this->assign('vcode', $vcode);
		$this->display('Login/index');
	
	}
	public function Verify()
	{
		$Verify = new \Think\Verify();
		$Verify->entry();
	}

	public function login()
	{	
		$user1 = M('user');
	    $user['uname'] = $_POST['uname'];
	    $user['pwd'] = md5($_POST['pwd']);
	    // var_dump($user);
	    $date = $user1->where($user)->select();
	    $date=$date['0'];
	    // var_dump($date);
	    // exit;
	    // ->fetchSql(ture)
	    if (empty($date)) {
	    	$this->error('用户名或密码错误!',U('Home/login/index'));
	    	exit;
	    } else {
	    	unset($date['pwd']);
	    	unset($date['email']);
	    	// unset($date['login_count']);
	    	unset($date['status']);
	    	session('home',$date);
	    	$tyu = session();
	    	// var_dump($tyu);
	    	// exit;
	    	// var_dump($date);
	    	$date = $user1->where($user)->setInc('login_count');
	    	// var_dump($date);
	    	// exit;
	    	// p($_SESSION);die;
	    	$this->success('登录成功',U('Home/index/index'));
	    }
	    
	}

	public function newpwd()
	{
		// var_dump($_POST);
		foreach ($_POST as $key => $val) {
			if ($val == '') {
				$this->error('请完善表单信息!',U('Home/login/password'));
				exit;
			}
		}
		$mdmm = md5($_POST['pwd']);
		$_POST['pwd'] = $mdmm;
		$mdmm2 = md5($_POST['pwdn']);
		$_POST['pwdn'] = $mdmm2;

		if ($_POST['pwd']!=$_POST['pwdn']) {
			$this->error('2次密码输入不一样!',U('Home/login/password'));
			exit;
		} else {
			$pwdn['uname'] = $_POST['uname'];
			$pwdn['email'] = $_POST['email'];
			// var_dump($pwdn);
			$date1 = M('user')->where($pwdn)->find();
			// var_dump($date1);
			if (empty($date1)) {
				$this->error('用户名或邮箱错误',U('Home/login/password'));
			} else {

				$user = M('user');
				$user->pwd=$_POST['pwd'];
				$date2 = $user->where($pwdn)->save();
				// var_dump($date2);
				// exit;
				if ($date2 > 0) {
					$this->success('修改成功',U('Home/index/index'));
				} else {
					$this->error('修改密码失败',U('Home/login/password'));
				}
			}
		}
		
	}
	public function logot()
	{
		unset($_SESSION['home']);
		$this->success('退出成功',U('Home/index/index'));
	}
}