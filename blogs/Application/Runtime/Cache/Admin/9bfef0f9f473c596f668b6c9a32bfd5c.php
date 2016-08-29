<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>分类列表</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css">
</head>
<body>
<form action="<?php echo U('Admin/Category/sort');?>" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <thead>
            <tr>
                <th width="10%">cid</th>
                <th width="15%">分类名</th>
                <th width="25%">关键词</th>
                <th width="25%">描述</th>
                <th width="15%">操作</th>         
            </tr>
        </thead>
        <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
                <td><?php echo ($v['cid']); ?></td>
                
                <td><?php echo ($v['cname']); ?></td>
                <td><?php echo ($v['keywords']); ?></td>
                <td><?php echo ($v['description']); ?></td>
                <td>
                    <a href="<?php echo U('Admin/Category/add',array('cid'=>$v['cid']));?>">添加子分类</a> | 
                    <a href="<?php echo U('Admin/Category/edit',array('cid'=>$v['cid']));?>">修改</a> | 
                    <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Category/delete',array('cid'=>$v['cid']));?>'">删除</a>             
                </td>
            </tr><?php endforeach; endif; ?>
    </table>
</form>
<script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
<script src="/app/item/blog/Public/admin/js/index.js"></script>
</body>
</html>