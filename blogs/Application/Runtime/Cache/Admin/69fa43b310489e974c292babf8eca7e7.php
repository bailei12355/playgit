<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>欢迎页面</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css">
</head>
<body>
<div id="welcome">
    <div class="block">
        <h3 class="title">文章统计</h3>
        <ul class="content">
            <li>文章总数：<?php echo ($all_article); ?></li>
            <li>已删文章数：<?php echo ($delete_article); ?></li>
            <li>不显示的文章数：<?php echo ($hide_article); ?></li>
        </ul>
    </div>
    <div class="block">
        <h3 class="title">随言碎语统计</h3>
        <ul class="content">
            <li>随言总数：<?php echo ($all_chat); ?></li>
            <li>已删随言数：<?php echo ($delete_chat); ?></li>
            <li>不显示的随言数：<?php echo ($hide_chat); ?></li>
        </ul>
    </div>
    <div class="block">
        <h3 class="title">评论统计</h3>
        <ul class="content">
            <li>评论总数：<?php echo ($all_comment); ?></li>
        </ul>
    </div>
</div>
<bootstrapjs />
</body>
</html>