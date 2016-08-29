<?php if (!defined('THINK_PATH')) exit(); if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="note-comment clearfix">
		<div class="content">
			<div class="meta-top">
				<a href="<?php echo U('Home/Personal/Personal',array('id' => $vo[uid]));?>" class="avatar">
					<?php if(empty($vo["head_img"])): ?><img src="/app/item/blog/Public/Picture/e6716d6e36154d1199319a551b5b3d89.gif" alt="100" />
					<?php else: ?>
						<img src="<?php echo ($vo["head_img"]); ?>" alt="100" /><?php endif; ?>
				</a>
				<p>
					<a href="<?php echo U('Home/Personal/Personal',array('id' => $vo[uid]));?>" class="author-name"><?php echo ($vo["nickname"]); ?></a>
				</p>
				<span class="reply-time">
				<small><?php echo ($vo["floor"]); ?>楼 · </small>
				<a href="javascript:void(0)"><?php echo ($vo["date"]); ?></a></span>
			</div>
			<p><?php echo ($vo["content"]); ?></p>
			<div class="comment-footer clearfix text-right">
				<a href="javascript:void(0)" class="like pull-left likecomment" data-id="<?php echo ($vo["cmtid"]); ?>">
					<?php if($vo["zan_status"] == 1): ?><i class="fa fa-heart"></i>喜欢<span class="zan">(<?php echo ($vo["zan"]); ?>)</span>
					<?php else: ?>
						<i class="fa fa-heart-o"></i>喜欢<span class="zan">(<?php echo ($vo["zan"]); ?>)</span><?php endif; ?>
					
				</a>
				<a href="javascript:void(0)" class="reply" data-nickname="<?php echo ($vo["nickname"]); ?>" data-id="<?php echo ($vo["cmtid"]); ?>">回复</a>

				<?php if($vo["uid"] == $uid): ?><a class="delete" data-remote="true" data-commenter-id="<?php echo ($vo["cmtid"]); ?>" rel="nofollow" data-method="delete" data-type="json" href="">删除</a><?php endif; ?>
				<?php if(!empty($vo["list"])): ?><div id="child<?php echo ($vo["cmtid"]); ?>" class="child-comment-list">
				<?php else: ?>
					<div id="child<?php echo ($vo["cmtid"]); ?>" class="child-comment-list" style="display:none;"><?php endif; ?>
					<div  id="childlist<?php echo ($vo["cmtid"]); ?>">
					<?php if(is_array($vo["list"])): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><div class="child-comment">
							<p class="text-left">
								<a href="<?php echo U('Home/Personal/index',array('id' => $vos[uid]));?>" class="blue-link"><?php echo ($vos["nickname"]); ?></a>：
								<?php if(!empty($vos["ruid"])): ?><a target="_blank" class="maleskine-author" href="<?php echo U('Home/User/index',array('id' => $vos[ruid]));?>">@<?php echo ($vos["user"]["nickname"]); ?></a><?php endif; ?>
								<?php echo ($vos["content"]); ?> 
							</p>
							<div class="child-comment-footer text-right clearfix">
								<a href="javascript:void(null)" class="reply" data-nickname="<?php echo ($vos["nickname"]); ?>" data-ruid="<?php echo ($vos["ruid"]); ?>" data-id="<?php echo ($vo["cmtid"]); ?>">回复
								
								</a>
								<?php if($vos["uid"] == $uid): ?><a class="delete" data-remote="true" data-commenter-id="<?php echo ($vos["cmtid"]); ?>" rel="nofollow" data-method="delete" data-type="json" href="">删除</a><?php endif; ?>
								<span class="reply-time pull-left">
									<a href="javascript:void(0)"><?php echo ($vos["date"]); ?></a>
								</span>
							</div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
					<div data-state="remaining-child-comments"></div>
					<div class="comment-toolbar clearfix">
						<span class="pull-right">
							<a href="javascript:void(null)" class="reply" data-id="<?php echo ($vo["cmtid"]); ?>"><i class="fa fa-pencil"></i> 添加新回复</a>
						</span>
					</div>
				</div>
				<form method="post" data-type="json" data-remote="true" accept-charset="UTF-8" action="" class="new-child-comment" id="from<?php echo ($vo["cmtid"]); ?>" style="display:none;">

					<div class="comment-text">
						<textarea id="<?php echo ($vo["cmtid"]); ?>" name="comment[content]" class="mousetrap_c" placeholder="写下你的评论…" maxlength="2000"></textarea>
						<div>
							<input type="button" data-disable-with="提交中..." class="btn btn-small btn-info" value="发 表" name="commit" >
							<div class="emoji">
								<span style="display: none" class="warning">
									<i class="fa fa-exclamation-circle"></i>
									<span class="warning-text"></span>
								</span>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div><?php endforeach; endif; else: echo "" ;endif; ?>