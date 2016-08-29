<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>已删文章</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <style type="text/css">
    table {
        word-break:break-all;
        word-wrap:break-word;
    }
    </style>
</head>
<body>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th width="5%">cmtid</th>
            <th width="15%">所属文章</th>
            <th width="20%">内容</th>
            <th width="30%">评论时间</th>
            <th width="30%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['cmtid']); ?></td>
            <td><?php echo ($v['title']); ?></td>
            <td><?php echo ($v['content']); ?></td>
            <td><?php echo ($v['data']); ?></td>
            <td>
                <a href="<?php echo U('Admin/Recycle/recovercomment',array('cmtid'=>$v['cmtid']));?>">恢复</a> |
                <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Recycle/deletecomment',array('cmtid'=>$v['cmtid']));?>'">彻底删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
</body>
</html>