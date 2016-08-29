<?php
namespace Home\Controller;
use Think\Controller;


/**
* 个人中心
*/
class GrzxController extends Controller
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
		$comment=M('comment');
		$like=M('like');
		$article=M('article');
		$article_pic=M('article_pic');
		$list =$article->table("blog_article a,blog_user_info ui")
		    ->field("a.aid,a.uid,a.title,a.click,a.ds,ui.nickname")
		    ->where("a.uid=ui.uid AND ui.uid = '{$uid}'")
		    ->select();

		for ($i=0;$i<count($list);$i++)
		{
		    $count=$comment->field("COUNT(cmtid) counts")
		        ->where('aid='.$list[$i]['aid'])
		        ->select();
		    $likes=$like->field("COUNT(aid) likes")
		        ->where('aid='.$list[$i]['aid'])
		        ->select();
		    $iname=$article_pic->field('iname')
		        ->where('aid='.$list[$i]['aid'])
		        ->select();
		    $list[$i]['comments']=$count[0]['counts'];
		    $list[$i]['likes']=$likes[0]['likes'];
		    if ($iname) {
		        $list[$i]['iname'] = $iname[0]['iname'];
		    }else{
		        $list[$i]['iname'] = '1.png';
		    }
		}
		// p($list);die;

		$this->assign('list',$list);
		$this->assign('date', $date);
		$this->assign('date1', $date1);
		$this->display('Grzx/index');
	
	}

	public function edit()
	{
		$uid = $_SESSION['home']['uid'];
		$date = M('user_info')->where("uid = '{$uid}'")
		// ->fetchSql()
		->select();
		$date = $date['0'];
		// p($date);	
		$date1 = M('user')->where("uid = '{$uid}'")->select();
		$date1 = $date1['0'];
		// p($_GET);exit;
		$aid = $_GET['id'];
		$xg = M('article')->where("aid = '{$aid}'")->select();
		// p($xg);
		$xg = $xg['0'];
		$this->assign('date', $date);
		$this->assign('xg', $xg);
		$this->assign('date1', $date1);
		$this->display('Grzx/edit');
	}

	public function edit1()
	{
		// p($_GET);
		// p($_POST);
		$user = M('article');
		$user->create();
		$user1 = $_GET['id'];

			if ($user->where("aid ='{$user1}'")->save() > 0) {
			    $this->success('修改成功',U('index'));
			} else {
			    $this->error('修改失败');
			}
	}

	public function del()
	{
		$user = M("article"); 
		$user->create();
		$user1 = $_GET['id'];
		if ($user->where("aid ='{$user1}'")->delete() > 0) {
		    $this->success('删除成功',U('index'));
		} else {
		    $this->error('删除失败');
		}
	}
}