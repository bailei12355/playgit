<?php
	namespace Admin\Controller;
	use Admin\Controller\AdminController;

	/**
	* 
	*/
	class RecycleController extends AdminController
	{
		public function article()
		{
			$data = M('article')->table('blog_user u,blog_category c,blog_article a')->field('a.aid,a.title,c.cname ,u.uname')->where('u.uid=a.uid AND a.cid=c.cid AND is_delete=0')->select();
			// p($data);
			$this->data = $data;
			$this->display();
		}
		public function recover()
		{
			$aid = I('get.aid',0,'intval');
			if (M('article')->where(array('aid'=>$aid))->setField('is_delete','1')) {
				$this->success('恢复成功');
			}else{
				$this->error('恢复失败');
			}
		}
		public function delete()
		{
			$aid = I('get.aid',0,'intval');
			if (M('article')->where(array('aid'=> $aid))->delete()) {
				$this->success('删除成功',U('Article/index'));
			} else {
				$this->error('删除失败');
			}
		}

		// 评论回收管理
		public function comment()
		{
			$data= M('comment')->table('blog_article a, blog_comment c')->field('a.title, c.cmtid, c.date, c.content')->where('c.aid=a.aid AND c.is_delete=1')->select();
			// p($data);
			$this->data=$data;
			$this->display();
		}
		public function deletecomment()
		{
			$cmtid = I('get.cmtid',0,'intval');
			if (M('comment')->where(array('cmtid'=> $cmtid))->delete()) {
				$this->success('删除成功',U('Recycle/comment'));
			} else {
				$this->error('删除失败');
			}
		}
		public function recovercomment()
		{
			$cmtid = I('get.cmtid',0,'intval');
			if (M('comment')->where(array('cmtid'=>$cmtid))->setField('is_delete','0')) {
				$this->success('恢复成功');
			}else{
				$this->error('恢复失败');
			}
		}
	}