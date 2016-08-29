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
            <th width="5%">aid</th>
            <th width="15%">所属分类</th>
            <th width="20%">作者</th>
            <th width="30%">标题</th>
            <th width="30%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['aid']); ?></td>
            <td><?php echo ($v['cname']); ?></td>
            <td><?php echo ($v['uname']); ?></td>
            <td><?php echo ($v['title']); ?></td>
            <td>
                <a href="<?php echo U('Admin/Recycle/recover',array('aid'=>$v['aid']));?>">恢复</a> |
                <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Recycle/delete',array('aid'=>$v['aid']));?>'">彻底删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
</body>
</html>