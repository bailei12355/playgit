<?php
namespace Home\Model;
use Think\Model;
//作者用户关注表
class AttentionCategoryModel extends Model {
	//根据ID获取专题被关注数量
	public function getAttentionCount($id){
		$where = array(
			'atd_cid' => $id	
		);
		$count = $this->where($where)->count();
		return $count;
	}
	//根据专题ID和用户ID获取是否关注专题
	public function getUserAttention($id,$uid){
		$where = array(
			'atd_cid' => $id,
			'uid' => $uid,
		);
		$count = $this->where($where)->count();
		return $count;
	}

	//用户关注专题操作  
	public function editAttention($uid,$atd_cid){
		//设定查询条件
		$where = array(
			'uid' => $uid,
			'atd_cid' => $atd_cid,
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