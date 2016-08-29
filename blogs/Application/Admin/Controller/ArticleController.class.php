<?php

namespace Admin\Controller;
use Admin\Controller\AdminController;

class ArticleController extends AdminController
{
	public function index()
	{
		$User = M('article'); // 实例化User对象
		$count = $User->where(array('is_delete'=>0))->count();// 查询满足要求的总记录数
		$Page = new \Think\Page($count,5);// 实例化分页类 传入总记录数和每页显示的记录数(25)
		$show = $Page->show();// 分页显示输出
		// 进行分页数据查询 注意limit方法的参数要使用Page类的属性
		$list = $User->table('blog_user u,blog_category c,blog_article a')->field('a.aid,a.title,a.content,a.keywords,a.description,a.is_show,a.is_top,a.is_original,a.click,a.ds,a.time,c.cname ,u.uname')->where('u.uid=a.uid AND a.cid=c.cid AND is_delete=0')->limit($Page->firstRow.','.$Page->listRows)->
		select();
		// p($list);
		$this->assign('data',$list);// 赋值数据集
		$this->assign('page',$show);// 赋值分页输出
		$this->display(); // 输出模板
	}
	public function add()
	{
		if (IS_POST) {
			I('post.');
			M('article')->create();
			if (M('article')->add()) {
				$this->success('添加成功',U('Article/index'));
			} else {
				$this->error('添加失败');
			}
		} else {
			$list = M('category')->field(array('cid,cname'))->select();
			// p($list);
			$this->assign('list',$list);
			$this->display();
		}
	}
	
	public function delete()
	{
		$aid = I('get.aid',0,'intval');
		if (M('article')->where(array('aid'=> $aid))->setField('is_delete','1')) {
			$this->success('删除成功',U('Article/index'));
		} else {
			$this->error('删除失败');
		}
	}
	public function edit()
	{
		if (IS_POST) {
			$data = I('post.');
			M('article')->create();
			// p($data);die;
			if (M('article')->save()) {
				$this->success('修改成功',U('Article/index'));
			}else{
				$this->error('修改失败');
				// E('错误');
			}

		} else {
			$aid = I('get.aid',0,'intval');
			$data = M('article')->table('blog_user u,blog_category c,blog_article a')->field('a.aid,a.title,a.content,a.keywords,a.description,a.is_show,a.is_delete,a.is_top,a.is_original,a.click,a.ds,a.time,c.cname , c.cid,u.uname')->where("u.uid=a.uid AND a.cid=c.cid AND aid = $aid")->select();
			$data = $data[0];
			// p($data);die;
			$list = M('category')->field('cid, cname')->select();
			$this->assign('list', $list);
			$this->assign('data', $data);
			$this->display();
		}
	}

}