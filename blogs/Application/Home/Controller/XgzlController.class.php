<?php
namespace Home\Controller;
use Think\Controller;


/**
* 前台登录
*/
class XgzlController extends Controller
{
	public function index()
	{
		$uid = $_SESSION['home']['uid'];
		$date = M('user_info')->where("uid = '{$uid}'")
		// ->fetchSql()
		->select();
		$date = $date['0'];
		// p($date);
		$date1 = M('user')->where("uid = '{$uid}'")->select();
		$date1 = $date1['0'];
		// p($date1);

		$this->assign('date', $date);
		$this->assign('date1', $date1);
		$this->display('Grzx/Grzx');
	
	}
	public function xgzl()
	{	
		// p($_POST);
		// p($_SESSION);
		$user = M('user_info');
		$user->create();
		$user1 = $_SESSION['home']['uid'];

			if ($user->where("uid ='{$user1}'")->save() > 0) {
			    $this->success('修改成功',U('Home/Grzx/index'));
			} else {
			    $this->error('修改失败');
			}


	}
}