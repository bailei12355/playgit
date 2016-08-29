<?php
namespace Home\Model;
use Think\Model;
//文章用户关注表
class AttentionActicleModel extends Model {
	//根据ID获取文章被关注数量
	public function getAttentionCount($id){
		$where = array(
			'atd_aid' => $id	
		);
		$count = $this->where($where)->count();
		return $count;
	}
}