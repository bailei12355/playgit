<?php
namespace Home\Controller;
use Think\Controller;


/**
* 前台登录
*/
class SignupController extends Controller
{
	public function index()
	{
		$this->assign('vcode', $vcode);
		$this->display('Signup/index');
	
	}
	public function Verify()
	{
		$Verify = new \Think\Verify();
		$Verify->length = 5;
		$Verify->codeSet = '0123456789';
		$Verify->entry();
	}

	public function add()
	{
	    $this->assign('title','添加用户');
	    $this->display('User/add');
	}

	public function signup()
	{	
		// if (empty($_POST['name'] && $_POST['password'] && $_POST['mail'])) 
		// {		
				
		// 	$this->redirect('Home/signup/index');
		// 	exit;
		// } else {
		// 	$this->assign('title','添加用户');
		// 	$this->display('Home/signup/add');
		// }
		$User = D("User"); // 实例化User对象
		if (!$User->create()){
		// 如果创建失败 表示验证没有通过 输出错误提示信息
		exit($User->getError());
		}else{
		// 验证通过 可以进行其他数据操作
		}

	}
	//执行添加
	public function insert()
	{
	    // //判断 有无传递POST
	    $pwd =md5($_POST['pwd']);
	    // echo $pwd;
	    $_POST['pwd'] = $pwd;
	    // var_dump($_POST);
	    // // exit;
	    // if (empty($_POST['uname'] && $_POST['pwd'] && $_POST['email'])) {
	    //     $this->error('请完善表单数据!',U('Home/signup/index'));
	    //     exit;
	    // }
	    // //过滤数据
	    // M('user')->create();

	    // if (M('user')->add() > 0) {
	    //     $this->success('添加成功',U('index'));
	    // } else {
	    //     $this->error('添加失败');
	    // }
	    $User = D("User"); // 实例化User对象
	    if (!$User->create()){
		    // 如果创建失败 表示验证没有通过 输出错误提示信息
		    $this->error($User->getError());
		    exit;
	    }else{
	    	$id = $User->add();
	    	// echo $id;die();
	    	// var_dump($id);die();
	    	$uinfo = array();
	    	$uinfo['uid'] = $id; 
	    	$id = md5($id);
	    	$uinfo['nickname'] = $id; 
	    	$aid = M('User_info')->add($uinfo);
	    	if ($aid >0)
	    	{
	    	    $this->success('注册成功',U('index'));
	    	} else 
	    	{
	    	    $this->error('注册失败',U('index'));
	    	}
		    // $this->success('添加成功',U('index'));
	    }
	}

}