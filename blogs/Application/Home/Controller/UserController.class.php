<?php
namespace Admin\Controller;
use Think\Controller;
class UserController extends Controller {
    //查询
    public function index(){
        $data = M('user')->order('id desc')->select();
        $this->assign('title','用户列表');
        $this->assign('list',$data);
        $this->display();
    }

    //删除
    public function del()
    {
        //判断 有无传递ID
        if (empty($_GET['id'])) {
            $this->redirect('Admin/User/index');
            exit;
        }
        //接收ID
        // $id = $_GET['id'];
        $id = I('get.id/d');
        // echo $id;exit;

        //执行删除
        if (M('user')->delete($id) > 0) {
            $this->success('恭喜你,删除成功',U('index'));
        } else {
            $this->error('删除失败',U('index'));
        }
    }

    //添加页面
    public function add()
    {
        $this->assign('title','添加用户');
        $this->display('User/add');
    }

    //执行添加
    public function insert()
    {
        //判断 有无传递POST
        if (empty($_POST)) {
            $this->error('请添加数据!',U('Admin/User/add'));
            exit;
        }
        //过滤数据
        M('user')->create();

        if (M('user')->add() > 0) {
            $this->success('添加成功',U('index'));
        } else {
            $this->error('添加失败');
        }
    }

    //添加页面
    public function edit()
    {
        //接收参数
        $id = I('get.id/d');
        //查数据
        $data = M('user')->find($id);

        $this->assign('title','编辑用户');
        $this->assign('data',$data);
        $this->display('User/edit');
    }

    //执行修改
    public function update()
    {
        //判断 有无传递POST
        if (empty($_POST)) {
            $this->error('请完善数据!');
            exit;
        }
        M('user')->create();
        if (M('user')->save() > 0) {
            $this->success('编辑成功',U('index'));
        } else {
            $this->error('编辑失败');
        }
        

    }
}
