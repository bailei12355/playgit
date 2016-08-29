<?php
	namespace Admin\Controller;
	use Admin\Controller\AdminController;
	/**
	* 用户
	*/
	class UserController extends AdminController
	{
		
		public function index()
		{
			// $assign = M('user');
			// $data = $assign->select();
   // 			$this->assign('data',$data);

   //     	 	$this->display();
			$User = M('User'); // 实例化User对象
			$count = $User->count();// 查询满足要求的总记录数
			// exit;
			$Page = new \Think\Page($count,3);// 实例化分页类 传入总记录数和每页显示的记录数(25)
			$show = $Page->show();// 分页显示输出
			// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
			$list = $User->limit($Page->firstRow.','.$Page->listRows)->
			select();
			// var_dump($list);
			// echo $show;
			// exit;
			$this->assign('data',$list);// 赋值数据集ss
			$this->assign('page',$show);// 赋值分页输出
			$this->display(); // 输出模板
		}

		// 删除
		public function del(){
	       $uid = I('get.uid',0,'intval');
	       // echo $uid;
	       $id = M('user')->delete($uid);
	       if ($id > 0) {
	       		$this->success('删除成功');
	       }
    	}

    	// 编辑用户
    	// 修改分类
	    public function edit()
	    {
	    	$uid = I('get.uid',0,'intval');
	    	$data  = M('user')->where(array('uid'=>$uid))->find();
	    	$this->assign('data',$data);
	    	$this->display('User/edit');
	    }
	    public function save()
	    {
	    	if (!IS_POST && empty($_POST)) {
	    		E('非法操作');
	    		exit;	
	    	} 
	    	M('user')->create();
	        if (M('user')->save() > 0) {
	            $this->success('编辑成功',U('User/index'));
	        } else {
	            $this->error('编辑失败');
	        }
	    }
	    public function add()
	    {
	        $this->display();
	    }
	    //执行添加
	    public function insert()
	    {
	    	// dump($_POST);exit;
	        //判断 有无传递POST
	        if (empty($_POST)) {
	            $this->error('请添加数据!',U('Admin/Category/add'));
	            exit;
	        }
	        //过滤数据
	        M('user')->create();

	        if (M('user')->add() > 0 ) {
	            $this->success('添加成功',U('index'));
	        } else {
	            $this->error('添加失败');
	        }
	    }
	}