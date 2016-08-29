<?php
namespace Admin\Controller;
use Think\Controller;

/**
 * Rbac
 */
class RbacController extends Controller
{
	// 用户列表
	public function index()
	{
		$this ->result = D('admin')->relation(true)->field('adm_pwd',true)->select();
		// p($this->result);die;
		$this->display();
	}
	// 角色列表
	public function role()
	{
		$this->role=$role = M('role')->select();
		
		$this->display(); 
	}
	// 节点列表
	public function node()
	{
		$field = array('id','name','title','pid');
		$node = M('node')->order('sort')->field($field)->select();
		// echo "111";
		// die();
		
		$this->node = merge_node($node);
		// p($node);
		$this->display(); 
	}
	// 删除节点
	public function deleteNode()
	{
		$id = I('get.id',0,'intval');
		$del = M('node')->where("id={$id} or pid={$id}")->delete();
		// echo $del;die;
		if ($del) {
			$this->success('删除成功',U('Admin/Rbac/node'));
		} else {
			$this->error('删除失败');
		}
	}
	// 添加角色
	public function addRole()
	{
		$this->display();
	}
	public function addRoleHandle()
	{
		M('role')->create();
		if (M('role')->add($_POST)) {
			$this->success('添加成功',U('Admin/Rbac/role'));
		}else{
			$this->error('添加失败');
		}
	}
	// 添加节点
	public function addNode()
	{
		$this-> pid = I('pid',0,'intval');
		$this-> level = I('level',1,'intval');

		switch ($this->level) {
			case 1:
				$this->type = '应用';
				break;
			case 2:
				$this->type = '控制器';
				break;
			case 3:
				$this->type = '动作方法';
				break;
		}

		$this->display();
	}
	public function addNodeHandle()
	{
		if (empty($_POST)) {
			$this->error('请添加节点名称');
		}
		M('node')->create();
		if (M('node')->add($_POST)) {
			$this->success('添加成功',U('Admin/Rbac/node'));
		}else{
			$this->error('添加失败');
		}
	}
	public function access()
	{
		$rid = I('rid',0,'intval');
		$field = array('id','name','title','pid');
		$node = M('node')->order('sort')->field($field)->select();
		// p($node);
		$access = M('access')->where(array('role_id'=>$rid))->getField('node_id',true);
		$this->node = merge_node($node,$access);
		// p($node);die;
		$this->rid = $rid;
		$this->display();
	}
	// 设置权限
	public function setAccess()
	{
		// p($_POST);
		$rid = I('rid',0,'intval');
		$db = M('access');
		// 清空原权限
		$db->where(array('role_id'=>$rid))->delete();
		$data = array();
		foreach ($_POST[access] as $v) {
			$tmp = explode('_', $v);
			$data[] = array(
					'role_id'=>$rid,
					'node_id'=>$tmp['0'],
					'level'=>$tmp[1]
				);
		}
		// p($data);die;
		// $db->addAll($data);
		if ($db->addAll($data)) {
			$this->success('设置成功',U('Admin/Rbac/role'));
		} else {
			$this->error('删除失败');
		}
	}
	//添加用户
	public function addUser()
	{
		$this->role=M('role')->select();
		$this->display();
	}
	public function addUserHandle()
	{
		// P($_POST);die;
		$user = array(
				'adm_name'=>I('adm_name'),
				'adm_pwd'=>I('adm_pwd','','md5'),
				'last_login'=>time(),

			);
		$role = array();
		if ($uid = M('admin')->add($user)) {
			foreach ($_POST['role_id'] as $v) {
				$role[] = array(
					'role_id'=>$v,
					'user_id'=>$uid
					);
			}
			M('role_user')->addAll($role);
			$this->success('添加成功',U('Admin/Rbac/index'));
		}
	}

	// 锁定用户
	public function lock()
	{
		$id = I('get.adm_id',0,'intval');
		$lock = M('admin')->where(array('adm_id'=>$id))->setField('lock','1');
		if ($lock) {
			$this->success('用户已被锁定',U('Admin/Rbac/index'));
		} else {
			$this->error('权限不足');
		}

	}
	public function unlock()
	{
		$id = I('get.adm_id',0,'intval');
		$lock = M('admin')->where(array('adm_id'=>$id))->setField('lock','0');
		if ($lock) {
			$this->success('用户已解锁锁',U('Admin/Rbac/index'));
		} else {
			$this->error('权限不足');
		}

	}
} 