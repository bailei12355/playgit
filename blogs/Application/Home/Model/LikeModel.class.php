<?php
namespace Home\Model;
use Think\Model;
//文章用户喜欢表
class LikeModel extends Model {

	//根据文章id获取喜欢数量
	public function getLikeCount($id){
		$where = array(
			'aid' => $id	
		);
		$count = $this->where($where)->count();
		return $count;
	}
	//根据用户ID获取用户总体喜欢数量
	public function getUserLikeCount($uid){
		$where = array(
			'aid_uid' => $uid	
		);
		$count = $this->where($where)->count();
		return $count;
	}

	//根据文章id和用户id判断用户是否喜欢文章
	public function getUserLike($id,$uid){
		$where = array(
			'aid' => $id,
			'uid' => $uid
		);
		$count = $this->where($where)->count();
		return $count;
	}

	//根据文章id获取喜欢的用户信息
	public function getLikeList($id,$pageno=1,$pagenum=10){
		$limie = (($pageno-1)*$pagenum).','.$pagenum;
		$like = M('like l');
		$where = array(
			'aid' => $id	
		);
		//多表联查查询出来用户信息
		$list = $like->join("blog_user_info ui on l.uid=ui.uid")
					 ->where($where)->order('liketime desc')->limit($limit)->select();
		return $list;
	}

	//用户喜欢操作  
	public function editLike($info,$uid){
		//设定查询条件
		$where = array(
			'aid' => $info['aid'],
			'uid' => $uid
		);
		//查询是否已经喜欢
		$result = $this->where($where)->find();
		if($result){
			//如果喜欢就执行不喜欢操作 删除喜欢数据
			$this->where($where)->delete();
			$status = '0';
		}else{
			//如果还没有喜欢，就增加喜欢数据
			$add = array(
				'aid' => $info['aid'],
				'uid' => $uid,
				'aid_uid' => $info['uid'],
				'liketime' => date('Y-m-d H:i:s')
			);
			$this->add($add);
			$status = '1';
		}
		return $status;
	}
}