<?php 
namespace Admin\Model;
use Think\Model\RelationModel; 
class AdminModel extends RelationModel
{
	// 定义主表名称
	Protected $tabName = 'admin';
	// 定义关联关系
	Protected $_link = array(
			'role'=>array(
					'mapping_type'      => self::MANY_TO_MANY,
					'foreign_key' =>'user_id',
					'relation_foreign_key' => 'role_id',
					'relation_table' => 'blog_role_user',
					'mapping_fields' => 'id,name,remark'				)
		);
}



?>