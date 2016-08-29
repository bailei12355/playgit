<?php
namespace Admin\Controller;
use Think\Controller;


class CommentController extends Controller 
{
    public function index()
    {
        //文章信息model
        $article = M('article');

        //用户信息model
        $user = M('UserInfo');

        //文章评论信息model
        $comment = D('comment');

/*
       // 导入分页类
       import("ORG.Util.Page");
       // 实例化分页类
       $p = new \Think\Page($count, 10);
       // 获取查询参数
       $map['status'] = $_GET['status'];
       $map['nickname'] = $_GET['nickname'];
       foreach($map as $key=>$val) {   
           $p->parameter .= "$key=".urlencode($val)."&";   
       }
       // 分页显示输出
       $page = $p->show();

       // 当前页数据查询
       $list = $Dao->where($condition)->order('cmtid ASC')->limit($p->firstRow.','.$p->listRows)->select();

       // 赋值赋值
       $this->assign('page', $page);
       $this->assign('list', $list);
*/ 
        //获取当前页码
        $page = empty($_GET['p']) ? 1 : $_GET['p'];
        // 构造查询条件
        if(!empty($_GET['nickname'])){
            $map['nickname'] = $_GET['nickname'];
        }

        if(isset($_GET['status']) && $_GET['status'] != '全部'){
            $map['status'] = $_GET['status'];
        }
        //评论喜欢信息model
        $c_like = M('CommentLike');
        //根据条件和分页获取评论信息
        $comment_list = $comment->getList($map,$page);
        //根据查询条件获取评论数量
        $count = $comment->getCount($map);
        //根据总数和每页个数获取分页信息
        $Page       = new \Think\Page($count,5);
        //分页跳转的时候保证查询条件
        foreach($map as $key=>$val) {
            $Page->parameter[$key]   =   ($val);
        }
        // $Page->setConfig('header','条评论');
        //分页显示输出
        $show = $Page->show();

        $status_arr = array(0=>'未审核',1=>'审核');
        $type_arr = array(0=>'未删除',1=>'已删除');
        $this->assign('comment_list',$comment_list);
        //将get传递过来的值传到模板内
        $this->assign('str',$map);
        $this->assign('status_arr',$status_arr);
        $this->assign('type_arr',$type_arr);

        $this->assign('page',$show);// 赋值分页输出
        $this->display();
    }

    public function edit($cmtid)
    {
        //接收参数
        $cmtid = I('get.cmtid/d');
        //查数据
        $data = D('comment')->getInfo($cmtid);
        //dump($data);
        $status_arr = array(0=>'审核',1=>'未审核');
        $type_arr = array(0=>'未删除',1=>'已删除');
        $this->assign('status_arr',$status_arr);
        $this->assign('type_arr',$type_arr);
        $this->assign('title','编辑用户');
        $this->assign('data',$data);
        $this->display('Comment/edit');
    }

    public function update()
    {
        //判断 有无传递POST
        if (empty($_POST)) {
            $this->error('请完善数据!');
            exit;
        }
        M('comment')->create();
        if (M('comment')->save() > 0) {
            $this->success('编辑成功',U('Comment/index'));
        } else {
            $this->error('编辑失败');
        }
    }

   
}
