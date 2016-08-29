<?php
namespace Home\Model;
use Think\Model;
//用户具体信息表
class UserInfoModel extends Model {
	//根据用户ID获取用户具体信息
	public function getUserInfo($uid){
		$where = array(
			'uid' => $uid,
		);
		$info = $this->where($where)->find();
		//获取用户被喜欢数量
		$like = D('like');
		$info['like_count'] = $like->getUserLikeCount($uid);
		//获取用户的关注数量
		$attention = D('AttentionAuthou');
		$info['attention_count'] = $attention->getAttentionCount($uid);
		return $info;
	}

	public function getUser_uid($nickname){
		$where = array(
			'nickname' => $nickname,
			);
		$nick = $this->where($where)->find();
		return $nick;
	}


	//根据文章ID获取作者信息
	public function getUser_Info($id)
	{
	    $where = array(
	        'aid' => $id,
	        );
	    $uif = $this->where($where)->find();
	}
}