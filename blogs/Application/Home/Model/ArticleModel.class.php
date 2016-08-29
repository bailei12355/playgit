<?php
namespace Home\Model;
use Think\Model;
//文章信息表
class ArticleModel extends Model {
	//获取文章详情
	public function getInfo($id){
		$where = array(
			'aid' => $id,
			'is_delete' => 0,	
		);
		$info = $this->where($where)->find();
		//获取文章的喜欢数量
		$like = D('like');
		$info['like_count'] = $like->getLikeCount($id);
		//获取文章的关注数量
		$attention = D('AttentionActicle');
		$info['attention_count'] = $attention->getAttentionCount($id);
		//获取文章的评论数量
		$comment = D('comment');
		$info['comment_count'] = $comment->getCommentCount($id);
		return $info;
	}
	//给文章的点击数加1
	public function addClick($id){
		$where = array(
			'aid' => $id	
		);
		$this->where($where)->setInc('click');
	}


	public function getArticle($id)
	{
		$where = array(
			'aid' => $id,
			'is_delete' => 0,	
		);
		$info = $this->where($where)->find();
		return $info;
	}


	public function add_article()
	    {
	        $article_arr = array();
	//		echo I('post.title','','string');
	        $article_arr['title'] = I('post.title', '', 'string');
	        $article_arr['cid'] = I('post.cid');
	        $article_arr['content'] = $_POST['content'];
	//		p($article_arr);
	//		p($_POST);die();
	        $article_arr['uid'] = $_SESSION['home']['uid'];
	        $article_arr['keywords'] = "随笔";
	        $article_arr['description'] = "随笔";
	        $article_arr['is_show'] = 1;
	        $article_arr['is_delete'] = 0;
	        $article_arr['is_top'] = 0;
	        $article_arr['is_original'] = 1;
	        $article_arr['click'] = 0;
	        $article_arr['ds'] = 0;
	        $article_arr['time'] = time();
	//        p($_POST);die();
	        $artcle = M('article');

	        //验证通过
	        $aid = M('article')->add($article_arr);
	        if ($aid > 0) {
	            $a_pic = array();
	            $a_pic['iname'] = I('post.iname');
	            $a_pic['aid'] = $aid;
	            if (M('article_pic')->add($a_pic))
	                return true;
	        } else {
	            return false;
	        }
	    }

}