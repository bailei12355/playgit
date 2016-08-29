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
    <style>
        .add-role{
            display: inline-block;
            width: 100px;
            height: 26px;
            line-height: 26px;
            border-radius: 4px;
            border:1px solid blue;
            margin-left: 20px;
            cursor:pointer;
            text-align: center;
        }
    </style>
</head>
<body>
<form class="form-group" action="<?php echo U('Admin/Rbac/addUserHandle');?>" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">
        
        <tr>
            <th>用户名</th>
            <td>
                <input class="form-control modal-sm" type="text" name="adm_name">
            </td>
        </tr>
        <tr>
            <th>密码</th>
            <td>
                <input class="form-control modal-sm" type="password" name="adm_pwd" >
            </td>
        </tr>
        
        <tr>
            <th>所属角色</th>
            <td>
                <select name="role_id[]">
                    <?php if(is_array($role)): foreach($role as $key=>$v): ?><option value="<?php echo ($v['id']); ?>"><?php echo ($v['name']); ?>(<?php echo ($v['remark']); ?>)</option><?php endforeach; endif; ?>
                </select>
                <span class="add-role">添加角色</span>
            </td>
        </tr>
        <tr id="last">
            <td align="center" colspan="2">
                <input type="submit" value="保存添加">
            </td>
        </tr>
        <!-- <tr>
            <th></th>
            <td>
                <input class="btn btn-success" type="submit" value="添加">
            </td>
        </tr> -->
    </table>
</form>
    <script src="/app/item/blog/Public/jquery-1.8.3.min.js"></script>
    <script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
    <script src="/app/item/blog/Public/admin/js/index.js"></script>
    <script>
    $(function(){
        $('.add-role').click(function(){
            var obj = $(this).parents('tr').clone();
            obj.find('.add-role').remove();
            $('#last').before(obj);
        })
    })
    </script>
</body>
</html>