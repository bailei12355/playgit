<?php if (!defined('THINK_PATH')) exit(); if(is_array($like_list)): $i = 0; $__LIST__ = $like_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li data-user-id="<?php echo ($vo["uid"]); ?>">
		<a href="<?php echo U('Home/Personal/index',array('id' => $vo[uid]));?>" class="avatar">
			<?php if(empty($vo["head_img"])): ?><img src="/blogs/Public/Picture/e6716d6e36154d1199319a551b5b3d89.gif" alt="100" />
			<?php else: ?>
				<img src="<?php echo ($vo["head_img"]); ?>" alt="100" /><?php endif; ?>
		</a>
		<a href="<?php echo U('Home/User/Info',array('id' => $vo[uid]));?>" class="blue-link"><?php echo ($vo["nickname"]); ?></a>
		<span class="time"><?php echo ($vo["liketime"]); ?></span>
	</li><?php endforeach; endif; else: echo "" ;endif; ?>