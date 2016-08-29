<?php
namespace Home\Model;
use Think\Model;
//作者用户关注表
class AttentionAuthouModel extends Model {
	//根据ID获取作者被关注数量
	public function getAttentionCount($id){
		$where = array(
			'atd_uid' => $id	
		);
		$count = $this->where($where)->count();
		return $count;
	}
	//根据作者ID和用户ID获取是否关注作者
	public function getUserAttention($id,$uid){
		$where = array(
			'atd_uid' => $id,
			'uid' => $uid
		);
		$count = $this->where($where)->count();
		return $count;
	}

	//用户关注用户操作  
	public function editAttention($uid,$atd_uid){
		//设定查询条件
		$where = array(
			'uid' => $uid,
			'atd_uid' => $atd_uid
		);
		//查询是否已经关注
		$result = $this->where($where)->find();
		if($result){
			//如果关注就执行不关注操作 删除关注数据
			$this->where($where)->delete();
			$status = '0';
		}else{
			//如果还没有关注，就增加关注数据
			$this->add($where);
			$status = '1';
		}
		return $status;
	}
}


