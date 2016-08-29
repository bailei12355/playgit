<?php
namespace Home\Model;
use Think\Model;
//文章评论信息表
class CommentModel extends Model {
	//根据ID获取文章评论数量
	public function getCommentCount($id){
		$where = array(
			'aid' => $id
		);
		$count = $this->where($where)->count();
		return $count;
	}

	//根据ID获取文章评论列表
	public function getList($id,$pageno=1,$pagenum=1000,$order='date'){
		//分页
		$limit = (($pageno-1)*$pagenum).','.$pagenum;
		$comment = M('comment c');
		$comment_l = D('CommentLike');
		//设定查询条件，查出文章下的一级评论
		$where = array(
			'aid' => $id,
			'pid' => 0,
			'status' => '1',
			'is_delete' => 0
		);
		//多表联查查询出来用户信息
		$list = $comment->join("blog_user_info ui on c.uid=ui.uid")
					 ->where($where)->order($order)->limit($limit)->select();
		//循环一级评论列表  查出每个一级评论下的子评论
		foreach($list as $k=>$v){
			$list[$k]['zan_status'] = $comment_l->getLikeStatus($v['cmtid'],$_SESSION['home']['uid']);
			$list[$k]['list'] = $this->getChildList($v['cmtid'],$order);
		}
		return $list;
	}

	//根据评论id获取评论下子评论信息
	public function getChildList($pid,$order){
		$user = D('UserInfo');
		$comment = M('comment c');
		//设定查询条件，查出子评论信息
		$where = array(
			'pid' => $pid,
			'status' => '1',
			'is_delete' => 0
		);
		//多表联查查询出来用户信息
		$list = $comment->join("blog_user_info ui on c.uid=ui.uid")
				 ->where($where)->order('date')->limit($limit)->select();
		//循环子评论列表，补全针对回复评论所属的用户ID
		foreach($list as $k=>$v){
			$list[$k]['user'] = $user->getUserInfo($v['ruid']);
		}
		return $list;
	}

	//根据评论id获取评论下内容
	public function getInfo($id){
		$where = array(
			'cmtid' => $id	
		);
		$info = $this->where($where)->find();
		return $info;
	}
	
	//根据内容和文章ID添加评论   pid父评论的id, 没有默认为0
	public function addComment($id,$uid,$content,$pid=0,$ruid=0){
		//获取最后一个评论的楼层
		$where = array(
			'aid' => $id,
			'pid' => 0
		);
		$f_info = $this->where($where)->order('floor desc')->find();
		//如果楼层存在就下一楼
		if($f_info['floor']){
			$floor = $f_info['floor']+1;
		}else{
			//不存在就是1楼
			$floor = 1;
		}

		//设定评论增加的信息
		$add = array(
			'uid' => $uid,
			'type' => '1',
			'pid' => $pid,
			'ruid' => $ruid,
			'aid' => $id,
			'floor' => $floor,
			'content' => $content,
			'date' => date('Y-m-d H:i:s'),
			'status' => '1',
			'zan' => '0',
			'is_delete' => '0'
		);
		//获取增加的评论id
		$add['cmtid'] = $this->add($add);
		return $add;
	}


	public function del($cmtid){
		//设定查询条件
		$where = array(
			'cmtid' => $cmtid,
			'pid' => $cmtid	
		);
		//默认是and  用or的时候加这个
		$where['_logic'] = 'OR';
		//设定更新的数据
		$update = array(
			'is_delete' => 1
		);
		return $this->where($where)->save($update);
	}

}