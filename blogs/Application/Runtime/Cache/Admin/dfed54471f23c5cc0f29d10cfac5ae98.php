<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>修改分类</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css">
</head>
<body>
<form class="form-gropu" action="<?php echo U('Admin/Category/save');?>" method="post" enctype="multipart/form-data">
    <table class="table table-bordered table-hover">
        <input type="hidden" name="cid" value="<?php echo ($data['cid']); ?>">
        <tr>
            <th>分类名</th>
            <td><input class="form-control modal-sm" type="text" name="cname" value="<?php echo ($data['cname']); ?>"></td>
        </tr>
        
        <tr>
            <th>关键词</th>
            <td><input class="form-control modal-sm" type="text" name="keywords" value="<?php echo ($data['keywords']); ?>"></td>
        </tr>

        <tr>
            <th>分类图片</th>
            <td><input class="form-control modal-sm" type="file" name="cimg" value="<?php echo ($data['cimg']); ?>"></td>
        </tr>

        <tr>
            <th>描述</th>
            <td>
                <textarea class="form-control modal-sm" name="description"><?php echo ($data['description']); ?></textarea>
            </td>
        </tr>
        
        <tr>
            <th></th>
            <td><input class="btn btn-success" type="submit" value="提交"></td>
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