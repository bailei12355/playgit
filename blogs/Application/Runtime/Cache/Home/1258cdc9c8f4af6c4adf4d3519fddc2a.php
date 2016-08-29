<?php if (!defined('THINK_PATH')) exit();?><div class="note-comment clearfix">
	<div class="content">
		<div class="meta-top">
			<a href="<?php echo U('Home/User/Info',array('id' => $user[uid]));?>" class="avatar">
				<?php if(empty($user["head_img"])): ?><img src="/app/item/blog/Public/Picture/e6716d6e36154d1199319a551b5b3d89.gif" alt="100" />
				<?php else: ?>
					<img src="<?php echo ($user["head_img"]); ?>" alt="100" /><?php endif; ?>
			</a>
			<p>
				<a href="<?php echo U('Home/User/Info',array('id' => $user[uid]));?>" class="author-name"><?php echo ($user["nickname"]); ?></a>
			</p>
			<span class="reply-time">
			<small><?php echo ($info["floor"]); ?>楼 · </small>
			<a href="javascript:void(0)"><?php echo ($info["date"]); ?></a></span>
		</div>
		<p><?php echo ($info["content"]); ?></p>
		<div class="comment-footer clearfix text-right">
			<a href="javascript:void(0)" class="like pull-left likecomment" data-id="<?php echo ($info["cmtid"]); ?>">
				<i class="fa fa-heart-o"></i>喜欢<span class="zan">(<?php echo ($info["zan"]); ?>)</span>
			</a>
			<a href="javascript:void(0)" class="reply" data-nickname="<?php echo ($info["nickname"]); ?>" data-id="<?php echo ($info["cmtid"]); ?>">回复</a>
			<form method="post" id="from<?php echo ($vo["cmtid"]); ?>" data-type="json" data-remote="true" accept-charset="UTF-8" action="/notes/4931489/comments" class="new-child-comment" style="display:none;">
				<input type="hidden" value="3255871" name="comment[parent_id]">
				<div class="comment-text">
					<textarea name="comment[content]" class="mousetrap" placeholder="写下你的评论…" maxlength="2000"></textarea>
					<div>
						<input type="submit" data-disable-with="提交中..." class="btn btn-small btn-info" value="发 表" name="commit">
						<div class="emoji">
							<a data-toggle="modal" href="#emoji-modal">
								<i class="fa fa-smile-o"></i>
							</a>
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
</div>