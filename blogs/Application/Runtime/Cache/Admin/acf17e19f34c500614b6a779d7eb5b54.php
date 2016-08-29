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
</head>
<body>
<table class="table table-bordered table-striped table-hover table-condensed">
    <thead>
        <tr>
            <th width="5%">ID</th>
            <th width="10%">用户名</th>
            <th width="15%">上次登录时间</th>
            <th width="15%">锁定状态</th>
            <th width="10%">登录次数</th>
            <th width="20%">用户所属组别</th>
            <th width="25%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($result)): foreach($result as $key=>$v): ?><tr>
            <td><?php echo ($v['adm_id']); ?></td>
            <td><?php echo ($v['adm_name']); ?></td>
            <td><?php echo (date('y-m-d H:i:s',$v["last_login"])); ?></td>
            <td>
                <?php if($v['lock'] == 1): ?>已锁定
                <?php else: ?>
                未锁定<?php endif; ?>
            </td>
            <td><?php echo ($v['login_count']); ?></td>
            <td>
                <?php if($v["adm_name"] == C("RBAC_SUPERADMIN")): ?>超级管理员
                <?php else: ?>
                <ul>
                    <?php if(is_array($v["role"])): foreach($v["role"] as $key=>$val): ?><li><?php echo ($val["name"]); ?>(<?php echo ($val["remark"]); ?>)</li><?php endforeach; endif; ?>
                </ul><?php endif; ?>
            </td>
            <td>
                <?php if($v['lock'] == 1): ?><a href="<?php echo U('Admin/Rbac/unlock',array('adm_id'=>$v['adm_id']));?>">解锁</a>
                <?php else: ?>
                <a href="<?php echo U('Admin/Rbac/lock',array('adm_id'=>$v['adm_id']));?>">锁定</a><?php endif; ?>
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