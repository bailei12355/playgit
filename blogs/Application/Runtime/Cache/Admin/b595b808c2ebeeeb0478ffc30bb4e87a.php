<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>后台管理</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css">
</head>
<body>
<!-- 顶部导航菜单开始 -->
<div id="nav-top">
    <div class="nt-logo" style="background-color: #abc">
        <a href="<?php echo U('Admin/Index/index');?>"></a>
        <span>简-书</span>
    </div>
    <ul class="nt-nav list-unstyled">
        <li class="ntn-li ntn-active">
            <span class="fa fa-list-ul nt-ico"></span>
            文章管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-comments nt-ico"></span>
            评论管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-trash nt-ico"></span>
            回收管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-users nt-ico"></span>
            用户管理
        </li>
        <li class="ntn-li">
            <span class="fa fa-cogs nt-ico"></span>
            后台用户管理
        </li>
    </ul>
    <ul class="nt-msg list-unstyled">
        <li class="nt-go-index" style="background-color: #abc">
            <a href="<?php echo U('Home/Index/index');?>" target="_blank"><span class="fa fa-home"></span>前台首页</a>
        </li>
        <li class="nt-sign-out" style="background-color: #abc">
            <a href="<?php echo U('Admin/Index/logout');?>"><span class="fa fa-sign-out"></span>退出</a>
        </li>
    </ul>
</div>
<!-- 顶部导航菜单结束 -->

<!-- 左侧导航菜单开始 -->
<div id="nav-left">
    <!-- 内容管理开始 -->
    <div class="nl-con nl-show">
        <dl>
            <dt>
                <span class="fa fa-th"></span>文章管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Article/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>文章列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Article/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加文章
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
        
        <dl>
            <dt>
                <span class="fa fa-columns"></span>分类管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Category/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加分类
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Category/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>分类列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 内容管理结束 -->

    <!-- 留言评论开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-comment-o"></span>评论管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Comment/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>评论列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 留言评论结束 -->

    <!-- 回收管理开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-trash-o"></span>回收管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Recycle/article');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>已删文章
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Recycle/comment');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>已删评论
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <!-- <dd>
                <a href="<?php echo U('Admin/Recycle/chat');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>已删随言
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Recycle/link');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>已删友链
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd> -->
        </dl>
    </div>
    <!-- 回收管理结束 -->

    <!-- 用户管理开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-user"></span>用户管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/User/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>用户列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/User/add');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加用户
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 用户管理结束 -->

    <!-- 网站设置开始 -->
    <div class="nl-con">
        <dl>
            <dt>
                <span class="fa fa-cog"></span>后台用户管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Rbac/index');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>用户列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Rbac/addUser');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加用户
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
        <dl>
            <dt>
                <span class="fa fa-heart"></span>节点管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Rbac/node');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>节点列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Rbac/addNode');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加节点
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
        <dl>
            <dt>
                <span class="fa fa-heart"></span>角色管理
            </dt>
            <dd>
                <a href="<?php echo U('Admin/Rbac/role');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>角色列表
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
            <dd>
                <a href="<?php echo U('Admin/Rbac/addRole');?>" target="right_content"></a>
                <span class="fa fa-caret-right"></span>添加角色
                <div class="nl-checked">
                    <div class="nl-arrows"></div>
                </div>
            </dd>
        </dl>
    </div>
    <!-- 网站设置结束 -->
</div>
<!-- 左侧导航菜单结束 -->

<!-- 右侧内容开始 -->
<div id="content">
    <iframe id="content-iframe" src="<?php echo U('Admin/Index/welcome');?>" frameborder="0" width="100%" height="100%" name="right_content" scrolling="auto" frameborder="0" scrolling="no"></iframe>
</div>
<!-- 右侧内容结束 -->
    <script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
    <script src="/app/item/blog/Public/admin/js/index.js"></script>
    
</body>
</html>