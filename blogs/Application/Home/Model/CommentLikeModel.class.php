<?php
namespace Home\Model;
use Think\Model;
//喜欢评论表
class CommentLikeModel extends Model {

	//用户喜欢操作  
	public function editLike($id,$uid){
		//设定查询条件
		$where = array(
			'cmtid' => $id,
			'uid' => $uid
		);
		$c_where = array(
			'cmtid' => $id,
		);
		$comment = M('comment');
		//查询是否已经喜欢
		$result = $this->where($where)->find();
		if($result){
			//如果喜欢就执行不喜欢操作 删除喜欢数据
			$this->where($where)->delete();
			$comment->where($c_where)->setDec('zan');
			$status = '0';
		}else{
			//如果还没有喜欢，就增加喜欢数据
			$this->add($where);
			$comment->where($c_where)->setInc('zan');
			$status = '1';
		}
		return $status;
	}

	//根据评论id和用户id判断用户是否喜欢评论
	public function getLikeStatus($id,$uid){
		$where = array(
			'cmtid' => $id,
			'uid' => $uid
		);
		$count = $this->where($where)->count();
		return $count;
	}

}
