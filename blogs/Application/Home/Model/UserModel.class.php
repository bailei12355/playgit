<?php
namespace Home\Model;
use Think\Model;
//用户信息表
class UserModel extends Model {
	protected $_validate = array(
	array('yzm','require','验证码必须！'), //默认情况下用正则进行验证
	array('uname','','帐号名称已经存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
	array('repwd','pwd','确认密码不正确',0,'confirm'), // 验证确认密码是否和密码一致
	array('pwd','CheckPwd','密码格式不正确',0,'function'), // 自定义函数验证密码格式
	array('yzm','check_verify','验证码错误',1,'callback'),

	array('uname','CheckName','用户名错误',1,'callback',4),
	array('pwd','CheckPwd','密码错误',1,'callback',4),
	);

	public function Check_verify($code, $id = '')
	{
		$verify = new \Think\Verify();
		return $verify->check($code, $id);
	}

	public function CheckName()
	{
		$user1 = M('user');
		$user['uname'] = $_POST['uname'];
		$user['pwd'] = md5($_POST['pwd']);
		// var_dump($user);
		$date = $user1->where($user)->select();
		$date=$date['0'];
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
			var_dump($date);
			// exit;
			redirect('登录成功',U('Home/index/index'),1);
		}
	}
	public function CheckPwd()
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
		    	var_dump($date);
		    	exit;
		    	$this->success('登录成功',U('Home/index/index'));
		    }
	}

	public function getPoint($uid)
	{
	    $where = array(
	        'uid' => $uid,
	        );
	    $info = $this->field('point')->where($where)->find();
	    return $info['point'];
	}
}