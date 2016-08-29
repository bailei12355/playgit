<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>评论管理表</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <!-- <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css"> -->

</head>
<body>

<div class="container">
<div class="row">
<h1><?php echo ($title); ?></h1>
<form action="<?php echo U('Comment/update');?>" method="post" class="mt20 h3">
    <input type="hidden" name="cmtid" value="<?php echo ($data["cmtid"]); ?>">
    评论ID:
    <input type="text" name="cmtid" value="<?php echo ($data["cmtid"]); ?>" disabled><br><br>
    文章名:
    <input type="text" name="title" value="<?php echo ($data["title"]); ?>" disabled><br><br>
    用户名:
    <input type="text" name="nickname" value="<?php echo ($data["nickname"]); ?>" disabled><br><br>
    评论时间:
    <input type="text" name="date" value="<?php echo ($data["date"]); ?>" disabled><br><br>
    评论喜欢数量:
    <input type="text" name="zan" value="<?php echo ($data["zan"]); ?>" disabled><br><br>
    评论状态:
    <input type="radio" name="is_delete" value="1" <?php if($data["is_delete"] == '1'): ?>checked<?php endif; ?>>已删除
    <input type="radio" name="is_delete" value="0" <?php if($data["is_delete"] == '0'): ?>checked<?php endif; ?>>未删除<br><br>
    审核状态:
    <input type="radio" name="status" value="1" <?php if($data["status"] == '1'): ?>checked<?php endif; ?>> 已审核
    <input type="radio" name="status" value="0" <?php if($data["status"] == '0'): ?>checked<?php endif; ?>> 未审核<br><br>
    评论内容:
    <input name="content" value="<?php echo ($data["content"]); ?>" disabled><br><br>
    <input type="submit" value="保存" class="btn btn-bg btn-primary" style="width:100px;">
</div><!-- END row -->
</div><!-- END container -->




</form>



<script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
<script src="/app/item/blog/Public/admin/js/index.js"></script>
</body>
</html>