<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>添加文章</title>
    <icheckcss />
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <script type="text/javascript" src="/app/item/blog/Public/admin/ckeditor/ckeditor.js"></script>
    </head>
<body>
<form class="form-group" action="<?php echo U('Admin/Article/add');?>" method="post">
    <table class="table table-bordered table-striped table-hover table-condensed">
        <tr>
            <th width="80px">所属分类</th>
            <td>
                <select class="form-control modal-sm" name="cid">
                    <?php if(is_array($list)): foreach($list as $key=>$v): ?><option value="<?php echo ($v['cid']); ?>"><?php echo ($v['cname']); ?></option><?php endforeach; endif; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>标题</th>
            <td>
                <input class="form-control modal-sm" type="text" name="title">
            </td>
        </tr>
        <tr>
            <th>作者</th>
            <td>
                <input class="form-control modal-sm" type="text" name="author" value="<?php echo (C("AUTHOR")); ?>">
            </td>
        </tr>
        <tr>
         
        <tr>
            <th>关键词</th>
            <td>
                <input class="form-control modal-sm" placeholder="多个关键词用顿号分隔" type="text" name="keywords">
            </td>
        </tr>
        <tr>
            <th>描述</th>
            <td>
                <textarea id="content" class="form-control modal-sm ckeditor" name="content" rows="7"></textarea>
            </td>
        </tr>
        <tr>
            <th>描述</th>
            <td>
                <textarea id="content" class="form-control modal-sm ckeditor" name="description" rows="7"></textarea>
            </td>
        </tr>
        <tr>
            <th>是否原创</th>
            <td>
                <span class="inputword">是</span>
                <input class="icheck" type="radio" name="is_original" value="1" checked="checked">
                &emsp;
                <span class="inputword">否</span>
                <input class="icheck" type="radio" name="is_original" value="0">
            </td>
        </tr>
        <tr>
            <th>是否置顶</th>
            <td>
                <span class="inputword">是</span>
                <input class="icheck" type="radio" name="is_top" value="1">
                &emsp;
                <span class="inputword">否</span>
                <input class="icheck" type="radio" name="is_top" value="0" checked="checked">
            </td>
        </tr>
        <tr>
            <th>是否显示</th>
            <td>
                <span class="inputword">是</span>
                <input class="icheck" type="radio" name="is_show" value="1" checked="checked">
                &emsp;
                <span class="inputword">否</span>
                <input class="icheck" type="radio" name="is_show" value="0">
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input class="btn btn-success" type="submit" value="发表">
            </td>
        </tr>
    </table>
</form>
<icheckjs />
<script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
<script src="/app/item/blog/Public/admin/js/index.js"></script>
<script type="text/javascript">
    CKEDITOR.replace('content');
</script>
</body>
</html>