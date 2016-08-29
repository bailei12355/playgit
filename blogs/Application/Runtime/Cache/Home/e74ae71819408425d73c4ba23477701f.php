<?php if (!defined('THINK_PATH')) exit();?>
<!DOCTYPE html>
<!--[if IE 6]><html class="ie lt-ie8"><![endif]-->
<!--[if IE 7]><html class="ie lt-ie8"><![endif]-->
<!--[if IE 8]><html class="ie ie8"><![endif]-->
<!--[if IE 9]><html class="ie ie9"><![endif]-->
<!--[if !IE]><!--> <html> <!--<![endif]-->

<head>
    <meta charset="utf-8">
    <title>收了你无处安放的小青春 - 简书</title>
    <meta name="csrf-param" content="authenticity_token" />
    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/bootstrap.min.css" />
    <!--[if lte IE 8]><script src="/app/item/blog/Public/Scripts/html5.js"></script><![endif]-->
    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/base-28859e35d389885d08837bc971ff742c.css" />

    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/reading-bc4422e046bfdc9835cfcddb0c2de55d.css" />
    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/base-read-mode-64acccf6966299cfa3d580140a2582fe.css" />
    <script src="/app/item/blog/Public/Scripts/modernizr-613ea63b5aa2f0e2a1946e9c28c8eedb.js"></script>
    <!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
    <!--[if IE 8]><link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/for_ie-7f1c477ffedc13c11315103e8787dc6c.css" /><![endif]-->
    <!--[if lt IE 9]><link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/for_ie-7f1c477ffedc13c11315103e8787dc6c.css" /><![endif]-->
    <!--<link href="http://baijii-common.b0.upaiyun.com/icons/favicon.ico" rel="icon">-->
    <!--<link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/57-b426758a1fcfb30486f20fd073c3b8ec.png" sizes="57x57" />-->
    <!--<link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/72-feca4b183b9d29fd188665785dc7a7f1.png" sizes="72x72" />-->
    <!--<link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/76-ba757f1ad3421192ce7192170393d2b0.png" sizes="76x76" />-->
    <!--<link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/114-8dae53b3bcea3f06bb139e329d1edab3.png" sizes="114x114" />-->
    <!--<link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/120-fa315ee0177dba4c55d4f66d4129b47f.png" sizes="120x120" />-->
    <!--<link rel="apple-touch-icon-precomposed" href="http://cdn-qn0.jianshu.io/assets/apple-touch-icons/152-052f5799bec8fb3aa624bdc72ef5bd1d.png" sizes="152x152" />-->
    <!-- Baidu stats -->
    <script>
        var _hmt = _hmt || [];
        (function() {
            var hm = document.createElement("script");
            hm.src = "//hm.baidu.com/hm.js?0c0e9d9b1e7d617b3e6842e85b9fb068";
            var s = document.getElementsByTagName("script")[0];
            s.parentNode.insertBefore(hm, s);
        })();
    </script>
</head>

<body class="user output zh cn reader-day-mode reader-font2" data-js-module="user-show" data-locale="zh-CN">

<div class="navbar navbar-jianshu shrink">
    <div class="dropdown">
        <a class="dropdown-toggle logo" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="javascript:void(0)">
            简
        </a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li><a href="/"><i class="fa fa-home"></i> 首页</a></li>
            <li><a href="/collections"><i class="fa fa-th"></i> 专题</a></li>
            <li><a href="/user_invitations"><i class="fa fa-money"></i> 发钱啦</a></li>
        </ul>
    </div>
</div>
<div class="navbar-user">
    <?php if($_SESSION["home"] == ''): ?><a class="login" data-signup-link="true" data-toggle="modal" href="<?php echo U('Home/signup/index');?>">
        注册
        </a>
        <a class="login" data-signin-link="true" data-toggle="modal" href="<?php echo U('Home/Login/index');?>">
            登录
        </a>
        <a class="daytime set-view-mode pull-right" href="javascript:void(0)">
              <i class="fa fa-moon-o"></i>
        </a>
    <?php else: ?>
        <a class="login" data-signup-link="true" data-toggle="modal" href="<?php echo U('Home/Login/logot');?>">
            退出
        </a>
        <a class="login" data-signup-link="true" data-toggle="modal" href="<?php echo U('Home/grzx/index');?>">
            欢迎光临,用户:<?php echo ($_SESSION["home"]["uname"]); ?> |
        </a>
        <!-- 下拉开始 -->
            <!-- 下拉结束 --><?php endif; ?>
</div>
<div class="navbar navbar-jianshu expanded">
    <div class="dropdown">
        <a class="active logo" role="button" data-original-title="个人主页" data-container="div.expanded" href="/">
            <b>简</b><i class="fa fa-home"></i><span class="title">首页</span>
        </a>      <a data-toggle="tooltip" data-placement="right" data-original-title="专题" data-container="div.expanded" href="/collections">
        <i class="fa fa-th"></i><span class="title">专题</span>
    </a>    <a class="ad-selector" href="/apps">
        <i class="fa fa-mobile"></i><span class="title">下载手机应用</span>
    </a>    <div class="ad-container ">
        <div class="ad-pop">
            <img class="ad-logo" src="/app/item/blog/Public/Picture/114-8dae53b3bcea3f06bb139e329d1edab3.png" alt="114" />
            <p class="ad-title">简书</p>
            <p class="ad-subtitle">交流故事，沟通想法</p>
            <img class="ad-qrcode" src="/app/item/blog/Public/Picture/download-app-qrcode-053849fa25f9b44573ef8dd3c118a20f.png" alt="Download app qrcode" />
            <div>
                <a class="ad-link" href="https://itunes.apple.com/cn/app/jian-shu/id888237539?ls=1&amp;mt=8">iOS</a>·
                <a class="ad-link" href="http://downloads.jianshu.io/apps/haruki/JianShu-1.11.1.apk">Android</a>
            </div>
        </div>
    </div>
    </div>
    <div class="nav-user">
        <a href='#view-mode-modal' data-toggle='modal'><i class="fa fa-font"></i><span class="title">显示模式</span></a>

        <a class="signin" data-signin-link="true" data-toggle="modal" data-placement="right" data-original-title="登录" data-container="div.expanded" href="/sign_in">
            <i class="fa fa-sign-in"></i><span class="title">登录</span>
        </a>    </div>
</div>


<div class="row-fluid">

    <!-- aside -->
    <div class="user-aside span3">
        <div class="people">
            <div class="basic-info">
                <div class="avatar">
                    <img src="/app/item/blog/Uploads/touxiang/<?php echo ($date['head_img']); ?>" alt="100" />
                </div>
                <h3><?php echo ($date["nickname"]); ?></h3>
                <div class="btn-group" id="follow_mail_block_user_2525966">
                    <div class="btn btn-small btn-success follow">
                        <a data-signin-link="true" data-toggle="modal" href="<?php echo U('Home/xgzl/index');?>">修改个人资料</a>
                    </div>

                </div>
                <div class="about">
                    <p class="intro"></p>
                </div>
                <div class="sns">

                </div>
            </div>
            <div class="user-stats">
                <ul class="clearfix">
                    <li>
                        <a><b>0</b><span>关注</span></a>
                    </li>
                    <li>
                        <a><b>0</b><span>粉丝</span></a>
                    </li>
                    <br>
                    <li>
                        <a><b>1</b><span>文章</span></a>
                    </li>
                    <li>
                        <a><b>227</b><span>字数</span></a>
                    </li>
                    <li>
                        <a><b>0</b><span>收获喜欢</span></a>
                    </li>
                </ul>
            </div>
        </div>
        <!-- <hr> notebooks -->
        <div class="my-books">
            <h5 class="title">我的信息：</h5>
            <ul class="unstyled">
                <li>性别:     <i><?php echo ($date['sex']?'男':'女'); ?></i></li>
                <li>年龄:     <i><?php echo ($date['age']); ?></i></li>
                <li>手机号码: <i><?php echo ($date['mobile']); ?></i></li>
                <li>登录次数: <i><?php echo ($date1['login_count']); ?></i></li>
                <li>邮箱: <i><?php echo ($date1['email']); ?></i></li>
            </ul>
        </div>
        <!-- <hr> collections -->
        <!-- <hr> editable collections -->



    </div>
    <!-- content -->
    <div class="span9 offset3 recent-post">
        <!-- navigation -->
        <ul class="nav nav-tabs nav-articles">
            <li class="active"> 最新文章</li>
        </ul>
        <div class="tab-content">
            <div id="list-container" class="tab-pane active">
            <ul class="article-list thumbnails" id="btn-ul">

                <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="have-img">
                        <a class="wrap-img" href="<?php echo U('home/personal/index',array('id'=>$vo['uid']));?>">
                            <img src="/app/item/blog/Uploads/aimg/<?php echo ($vo["iname"]); ?>" alt="300"/>
                        </a>
                        <div>
                            <p class="list-top">
                                <a class="author-name blue-link" target="_blank" href="<?php echo U('home/personal/index',array('id'=>$vo['uid']));?>"><?php echo ($vo["nickname"]); ?></a>
                                <em>·</em>
                                <span class="time" data-shared-at="2016-07-18T21:44:11+08:00"></span>
                            </p>
                            <h4 class="title">
                                <a target="_blank" href="<?php echo U('home/particulars/index',array('id'=>$vo['aid']));?>"><?php echo ($vo["title"]); ?></a>
                            </h4>
                            <div class="list-footer">
                                <span>阅读 <?php echo ($vo["click"]); ?></span>
                                <span>· 评论 <?php echo ($vo["comments"]); ?></span>
                                <span>· 喜欢 <?php echo ($vo["likes"]); ?></span>
                                <span>· 打赏 <?php echo ($vo["ds"]); ?></span>
                            </div>
                            <br>
                            <p>
                                <a href="<?php echo U('home/Grzx/edit',array('id'=>$vo['aid']));?>">修改&nbsp</a> 
                                <a href="<?php echo U('home/Grzx/del',array('id'=>$vo['aid']));?>">&nbsp删除</a>
                            </p>
                        </div>
                    </li><?php endforeach; endif; else: echo "" ;endif; ?>

            </ul>
                <div class="hidden">

                </div>

            </div>
        </div>
    </div>


</div>

<div id="view-mode-modal" tabindex="-1" class="modal hide read-modal" aria-hidden="false" data-js-module='view-mode-modal'>
    <div class="btn-group change-background" data-toggle="buttons-radio">
        <a class="btn btn-daytime active" data-mode="day" href="javascript:void(null);">
            <i class="fa fa-sun-o"></i>
        </a>      <a class="btn btn-nighttime " data-mode="night" href="javascript:void(null);">
        <i class="fa fa-moon-o"></i>
    </a>    </div>
    <div class="btn-group change-font" data-toggle="buttons-radio">
        <a class="btn font " data-font="font1" href="javascript:void(null);">宋体</a>
        <a class="btn font hei active" data-font="font2" href="javascript:void(null);">黑体</a>
    </div>
    <div class="btn-group change-locale" data-toggle="buttons-radio">
        <a class="btn font active" data-locale="zh-CN" href="javascript:void(null);">简</a>
        <a class="btn font hei " data-locale="zh-TW" href="javascript:void(null);">繁</a>
    </div>
</div>



<!-- Javascripts
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<div id="flash" class="hide"></div>
<script src="/app/item/blog/Public/Scripts/base-ded41764c207f7ff545c28c670922d25.js"></script>
<script src="/app/item/blog/Public/Scripts/reading-base-7fc5fa7c6a3993128e61499f23be276d.js"></script>
<script src="/app/item/blog/Public/Scripts/user_show-eab8dc57532c45c4dec7e99b18489eb4.js"></script>

<script type="text/javascript">
    var _gaq = _gaq || [];
    _gaq.push(['_setAccount', 'UA-35169517-1']);
    _gaq.push(['_setCustomVar', 2, 'User Type', 'Visitor', 1 ]);
    _gaq.push(['_trackPageview']);



    (function() {
        var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
        ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
        var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
    })();
</script>

<script>
    (function(){
        var bp = document.createElement('script');
        bp.src = '//push.zhanzhang.baidu.com/push.js';
        var s = document.getElementsByTagName("script")[0];
        s.parentNode.insertBefore(bp, s);
    })();
</script>
</body>
</html>