<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>已删文章</title>
    <bootstrapcss />
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
            <td><?php echo ($v['category']['cname']); ?></td>
            <td><?php echo ($v['author']); ?></td>
            <td><?php echo ($v['title']); ?></td>
            <td>
                <a href="<?php echo U('Admin/Recycle/recover',array('table_name'=>'Article','id_name'=>'aid','id_number'=>$v['aid']));?>">恢复</a> |
                <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Article/delete',array('aid'=>$v['aid']));?>'">彻底删除</a>
            </td>
        </tr><?php endforeach; endif; ?>
</table>
<bootstrapjs />
</body>
</html>