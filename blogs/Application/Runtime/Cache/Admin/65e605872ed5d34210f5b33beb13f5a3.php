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
            <th width="10%">用户名</th>
            <th width="15%">密码</th>
            <th width="20%">邮箱</th>
            <th width="5%">积分</th>
            <th width="10%">状态</th>
            <th width="10%">登录次数</th>
            <th width="25%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['uid']); ?></td>
            <td><?php echo ($v['uname']); ?></td>
            <td><?php echo ($v['pwd']); ?></td>
            <td><?php echo ($v['email']); ?></td>
            <td><?php echo ($v['point']); ?></td>
            <td><?php echo ($v['status']); ?></td>
            <td><?php echo ($v['login_count']); ?></td>
            <td>
                <a href="<?php echo U('Admin/User/del',array('uid'=>$v['uid']));?>">
                    删除
                </a>&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="<?php echo U('Admin/User/edit',array('uid'=>$v['uid']));?>">
                    编辑
                </a>
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