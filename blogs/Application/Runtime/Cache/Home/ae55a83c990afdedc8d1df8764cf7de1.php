<?php if (!defined('THINK_PATH')) exit();?><div class="child-comment">
	<p class="text-left">
		<a href="<?php echo U('Home/User/Info',array('id' => $info[uid]));?>" class="blue-link"><?php echo ($user["nickname"]); ?></a>：
		<?php if(!empty($info["ruid"])): ?><a target="_blank" class="maleskine-author" href="<?php echo U('Home/User/Info',array('id' => $info[ruid]));?>">@<?php echo ($ruser["nickname"]); ?></a><?php endif; ?>
		<?php echo ($info["content"]); ?> 
	</p>
	<div class="child-comment-footer text-right clearfix">
		<a href="javascript:void(null)" class="reply" data-nickname="<?php echo ($user["nickname"]); ?>" data-ruid="<?php echo ($info["ruid"]); ?>" data-id="<?php echo ($info["pid"]); ?>">回复
		</a>
		<a class="delete" data-remote="true" data-commenter-id="<?php echo ($info["cmtid"]); ?>" rel="nofollow" data-method="delete" data-type="json" href="">删除</a>
		<span class="reply-time pull-left">
			<a href="javascript:void(0)"><?php echo ($info["date"]); ?></a>
		</span>
	</div>
</div>