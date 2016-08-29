<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>添加文章</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css">
</head>
<body>
<form class="form-group" action="<?php echo U('Admin/Rbac/addRoleHandle');?>" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">
        
        <tr>
            <th>角色名称</th>
            <td>
                <input class="form-control modal-sm" type="text" name="name">
            </td>
        </tr>
        <tr>
            <th>角色描述</th>
            <td>
                <input class="form-control modal-sm" type="text" name="remark">
            </td>
        </tr>
        
        
        
        
        <tr>
            <th>是否开启</th>
            <td>
                <span class="inputword">开启</span>
                <input class="icheck" type="radio" name="status" value="1" checked="checked">
                &emsp;
                <span class="inputword">关闭</span>
                <input class="icheck" type="radio" name="status" value="0">
            </td>
        </tr>
        
        
        <tr>
            <th></th>
            <td>
                <input class="btn btn-success" type="submit" value="添加">
            </td>
        </tr>
    </table>
</form>
    <script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
    <script src="/app/item/blog/Public/admin/js/index.js"></script>
</body>
</html>