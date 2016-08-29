<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>全部用户</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css">
</head>
<body>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th width="5%">id</th>
            <th width="10%">角色名称</th>
            <th width="15%">角色描述</th>
            <th width="20%">开启状态</th>
            <th width="25%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
            <td><?php echo ($v['id']); ?></td>
            <td><?php echo ($v['name']); ?></td>
            <td><?php echo ($v['remark']); ?></td>
            <td>
                <?php if($v['status'] == 1): ?>开启
                <?php else: ?>
                关闭<?php endif; ?>
            </td>
            <td>
                <a href="<?php echo U('Admin/Rbac/access',array('rid'=>$v['id']));?>">
                    配置权限
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<div style="text-align: center;">
    <?php echo ($page); ?>
</div>
    <script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
    <script src="/app/item/blog/Public/admin/js/index.js"></script>
</body>
</html>