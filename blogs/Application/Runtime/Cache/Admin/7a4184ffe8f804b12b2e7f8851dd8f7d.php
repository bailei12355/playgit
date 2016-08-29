<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
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
            <th width="3%">aid</th>
            <th width="9%">所属栏目</th>
            <th width="20%">标题</th>
            <th width="8%">作者</th>
            <th width="22%">描述</th>
            <th width="4%">原创</th>
            <th width="4%">显示</th>
            <th width="4%">置顶</th>
            <th width="5%">点击数</th>
            <th width="13%">发布时间</th>
            <th width="8%">操作</th>
        </tr>
    </thead>
    <?php if(is_array($data)): foreach($data as $key=>$v): ?><tr>
            <td><?php echo ($v['aid']); ?></td>
            <td><?php echo ($v['cname']); ?></td>
            <td><?php echo ($v['title']); ?></td>
            <td><?php echo ($v['uname']); ?></td>
            <td><?php echo ($v['description']); ?></td>
            
            <td>
                <?php if($v['is_original'] == 1): ?>✔
                <?php else: ?>
                    ✘<?php endif; ?>
            </td>
            <td>
                <?php if($v['is_show'] == 1): ?>✔
                <?php else: ?>
                    ✘<?php endif; ?>
            </td>
            <td>
                <?php if($v['is_top'] == 1): ?>✔
                <?php else: ?>
                    ✘<?php endif; ?>
            </td>
            <td><?php echo ($v['click']); ?></td>
            <td><?php echo (date('Y-m-d H:i:s',$v['addtime'])); ?></td>
            <td>
                <a href="<?php echo U('Admin/Article/edit',array('aid'=>$v['aid']));?>">修改</a> |
                <a href="javascript:if(confirm('确定要删除吗?')) location='<?php echo U('Admin/Article/delete',array('aid'=>$v['aid']));?>'">删除</a>
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