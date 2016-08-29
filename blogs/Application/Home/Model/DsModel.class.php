<?php
namespace Home\Model;
use Think\Model;
//用户打赏文章信息表
class DsModel extends Model {
	//根据文章uid获取打赏的信息
	public function getDsList($uid,$id)
	{
		$where = array(
			'uid' => $uid,
			'aid' => $id,
			);
		$info = $this->where($where)->find();
		return $info;
	}
}