<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn"> 
<head>
    <meta charset="utf-8">
    
<title><?php echo ($info["title"]); ?></title>

    <link rel="stylesheet" media="all" href="/blogs/Public/Css/base-28859e35d389885d08837bc971ff742c.css" />
    <link rel="stylesheet" media="all" href="/blogs/Public/Css/reading-note-cc35f3caf1b79498ea4800b856bcf8a6.css" />
    <link rel="stylesheet" media="all" href="/blogs/Public/Css/base-read-mode-64acccf6966299cfa3d580140a2582fe.css" />
	<script src="/blogs/Public/Scripts/jquery-1.8.3.min.js"></script>
	<script type="text/javascript">
	  $.noConflict();
	  // 使用另一个库的 $ 的代码
	</script>
    <script src="/blogs/Public/Scripts/modernizr-613ea63b5aa2f0e2a1946e9c28c8eedb.js"></script>
</head>

<body class="post output zh cn reader-day-mode reader-font2" data-js-module="note-show" data-locale="zh-CN">
	<!--左边框内容-->
	<div class="navbar navbar-jianshu expanded">
		<div class="dropdown">
			<a class="active logo" role="button" data-original-title="个人主页" data-container="div.expanded" href="/">
				<b>简</b><i class="fa fa-home"></i>
				<span class="title">首页</span>
			</a>
			<a data-toggle="tooltip" data-placement="right" data-original-title="专题" data-container="div.expanded" href="<?php echo U('Home/category/index');?>">
				<i class="fa fa-th"></i>
				<span class="title">专题</span>
			</a>
			<a class="ad-selector" href="<?php echo U('Home/Error/404');?>">
				<i class="fa fa-mobile"></i>
				<span class="title">下载手机应用</span>
			</a>
			<div class="ad-container ">
				<div class="ad-pop">
					<img class="ad-logo" src="/blogs/Public/Picture/114-8dae53b3bcea3f06bb139e329d1edab3.png" alt="114" />
					<p class="ad-title">简书</p>
					<p class="ad-subtitle">交流故事，沟通想法</p>
					<img class="ad-qrcode" src="/blogs/Public/Picture/download-app-qrcode-053849fa25f9b44573ef8dd3c118a20f.png" alt="Download app qrcode" />
					<div>
						<a class="ad-link" href="https://itunes.apple.com/cn/app/jian-shu/id888237539?ls=1&amp;mt=8">iOS</a>·
						<a class="ad-link" href="http://downloads.jianshu.io/apps/haruki/JianShu-1.11.1.apk">Android</a>
					</div>
				</div> 
			</div>
		</div>
		<div class="nav-user">
			<a href='#view-mode-modal' data-toggle='modal'><i class="fa fa-font"></i><span class="title">显示模式</span></a>
			<a class="signin" data-signin-link="true" data-toggle="modal" data-placement="right" data-original-title="登录" data-container="div.expanded" href="<?php echo U('Home/Login/index');?>">
				<i class="fa fa-sign-in"></i><span class="title">登录</span>
			</a>
		</div>
	</div>

	<!--右下角悬浮内容-->
	<div class="fixed-btn">
		<a class="go-top hide-go-top" href="#"> <i class="fa fa-angle-up"></i></a>
		<a class="qrcode" data-target="#bottom-qrcode" data-toggle="modal" href="javascript:void(0)"><i class="fa fa-qrcode"></i></a>
		<a class="writer" href="/writer#/" data-toggle="tooltip" data-placement="left" title="写篇文章"><i class="fa fa-pencil"></i></a>
		<!-- qrcode modal -->
		<div id="bottom-qrcode" class="modal panel-modal hide fade" tabindex="-1" role="dialog" aria-hidden="true">
			<h4>下载简书移动应用</h4>
			<div class="panel-body">
				<img src="/blogs/Public/Picture/download-app-qrcode-053849fa25f9b44573ef8dd3c118a20f.png" alt="Download app qrcode" />
			</div>
		</div>
	</div>


	<div id="show-note-container">
    
		<div class="post-bg" id="flag">
			<!--主体顶部内容-->
			<div class="wrap-btn">
				
				<!-- ******* -->
				<a class="login" data-signup-link="true" data-toggle="modal" href="<?php echo U('Home/Signup/index');?>">
					<i class="fa fa-user"></i> 注册
				</a>
				<a class="login" data-signin-link="true" data-toggle="modal" href="<?php echo U('Home/Login/index');?>">
					<i class="fa fa-sign-in"></i> 登录
				</a>
				<!-- Buttons upper right -->
				<!-- ******* -->
			</div>


			<!--文章主题相关内容-->
			
<div class="container">
    <!-- Article activities for width under 768px -->
    <div class="related-avatar-group activities"></div>
    <div class="article">
        <div class="preview">
            <!--作者信息-->
            <div class="author-info">
                <!--判断是否登录-->
                <?php if($is_login == 1): if($is_attention == 1): ?><div id="attention" class="btn btn-small follow following">
                            <a data-signin-link="true" data-toggle="modal" href="javascript:void(0);"><i class="fa fa-fw fa-check"></i><span>正在关注</span></a>
                        </div>
                    <?php else: ?>
                        <div id="attention" class="btn btn-small follow btn-success">
                            <a data-signin-link="true" data-toggle="modal" href="javascript:void(0);"><i class="fa fa-fw fa-plus"></i><span>添加关注</span></a>
                        </div><?php endif; ?>
                <?php else: ?>
                    <!--没有登录  点击关注后去登录页面-->
                    <div class="btn btn-small btn-success follow">
                        <a data-signin-link="true" data-toggle="modal" href="<?php echo U('Home/Login/index');?>"><i class="fa fa-plus"></i><span>添加关注</span></a>
                    </div><?php endif; ?>
                <!--判断作者是否有自定义头像  没有自定义头像显示默认头像-->
                <a class="avatar" href="<?php echo U('Home/Personal/index',array('id' => $userinfo[uid]));?>">
                    <?php if(empty($userinfo["head_img"])): ?><img src="/blogs/Public/Picture/e6716d6e36154d1199319a551b5b3d89.gif" alt="100" />
                    <?php else: ?>
                        <img src="<?php echo ($userinfo["head_img"]); ?>" alt="100" /><?php endif; ?>
                </a>
                <span class="label">
                    作者
                </span>
                <a class="author-name blue-link" href="<?php echo U('Home/Personal/index',array('id' => $userinfo[uid]));?>">
                    <span><?php echo ($userinfo["nickname"]); ?></span>
                </a>
                <span data-toggle='tooltip' data-original-title='最后编辑于 <?php echo ($info["time"]); ?>'><?php echo ($info["time"]); ?>*</span>
                <div>
                    <span>被<?php echo ($userinfo["attention_count"]); ?>人关注</span>，<span>获得了<?php echo ($userinfo["like_count"]); ?>个喜欢</span>
                </div>
            </div>
            <!--作者信息end-->
            <!--文章标题-->
            <h1 class="title"><?php echo ($info["title"]); ?></h1>
            <div class="meta-top">
                <!--阅读-->
                <span> 阅读<?php echo ($info["click"]); ?></span>
                <!--评论-->
                <span>评论<?php echo ($info["comment_count"]); ?></span>
                <!--喜欢-->
                <span>喜欢<?php echo ($info["like_count"]); ?></span>
            </div>
            <!-- Collection/Bookmark/Share for width under 768px -->
            <div class="article-share"></div>
            <!-- -->
            <!--文章内容主体-->
            <div class="show-content">
                <?php echo ($info["content"]); ?>
            </div>
            <!--文章内容主体end-->
        </div>
    </div>
    <!--文章版权-->
    <div class="visitor_edit">
        <div class="pull-right">
            <!-- copyright -->
            <div class="author-copyright pull-right" data-toggle="tooltip" data-html="true" title="转载请联系作者获得授权，并标注“简书作者”。">
                <a><i class="fa fa-copyright"></i>著作权归作者所有</a>
            </div>
        </div>
    </div>
    <!--文章版权end-->

    <!--文章打赏内容-->
    <!-- Reward / Support Author -->
    <div class="support-author">
        <!--判断是否登录-->
        <?php if($is_login == 1): ?><p>如果觉得我的文章对您有用，请随意打赏。您的支持将鼓励我继续创作！</p>
            <a class="btn btn-pay" data-toggle="modal" href="#pay-modal" id="ds">¥ 打赏支持</a>
        <?php else: ?>
            <p>如果觉得我的文章对您有用，请随意打赏。您的支持将鼓励我继续创作！</p>
            <a class="btn btn-pay" data-toggle="modal" href="<?php echo U('Home/Login/index');?>">¥ 打赏支持</a><?php endif; ?>
        <div class="avatar-list">
            <?php if(is_array($ds_list)): $i = 0; $__LIST__ = $ds_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a data-created-at="2016-07-24T10:49:16+08:00" data-nickname="<?php echo ($vo["nickname"]); ?>" class="avatar" href="<?php echo U('Home/Personal/index',array('id' => $vo[uid]));?>" data-original-title="" title="">
                    <?php if(empty($vo["head_img"])): ?><img src="/blogs/Public/Picture/e6716d6e36154d1199319a551b5b3d89.gif" alt="100" />
                    <?php else: ?>
                        <img src="<?php echo ($vo["head_img"]); ?>" alt="100" /><?php endif; ?>
                </a><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <!--文章打赏内容end-->
    <!-- 打赏modal -->
    <div class="modal pay-modal text-center hide fade" id="pay-modal" aria-hidden="false" style="display: none;">
        <div class="modal-header clearfix">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <form id="new_reward" class="new_reward" target="_blank" action="/notes/5054519/rewards" accept-charset="UTF-8" method="post">
            <div class="modal-body">
                <a href="/users/aecc8bbbc433">
                    <div class="avatar">
                        <?php if(empty($vo["head_img"])): ?><img src="/blogs/Public/Picture/e6716d6e36154d1199319a551b5b3d89.gif" alt="100" />
                        <?php else: ?>
                            <img src="<?php echo ($vo["head_img"]); ?>" alt="100" /><?php endif; ?>
                    </div>
                </a>
                <p>
                    <i class="fa fa-quote-left pull-left"></i>
                    如果觉得我的文章对你有帮助，请随意打赏。您的支持将鼓励我继续创作！
                    <i class="fa fa-quote-right pull-right"></i>
                </p>
                <div class="main-inputs text-left">
                    <div class="control-group">
                        <label for="reward_amount">打赏积分</label>
                        <input value="2" type="text" name="reward[amount_in_yuan]" id="reward_amount_in_yuan">
                    </div>
                </div>
                <div class="choose-pay text-left">
                    <h5>选择支付方式：</h5>
                    <div>
                        <label for="reward_channel_balance" class="">
                            <div class="iradio_minimal checked" style="position: relative;">
                                <input type="radio" value="balance" name="reward[channel]" id="reward_channel_balance" style="position: absolute; opacity: 0;">
                                <ins class="iCheck-helper" style="position: absolute; top: 0%; left: 0%; display: block; width: 100%; height: 100%; margin: 0px; padding: 0px; border: 0px; opacity: 0; background: rgb(255, 255, 255);"></ins>
                            </div>
                            简书余额（ 余额： <?php echo ($point); ?> ）
                        </label>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button name="button" type="button" class="btn btn-large btn-pay" id="pay-now">立即打赏</button>
            </div>
        </form>
    </div>
    <!-- 打赏modal 结束 -->

    <!-- 打赏成功 -->
    <div class="modal success-pay text-center hide fade in" id="success-pay" aria-hidden="false" style="display: none;">
      <div class="modal-header clearfix">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
      </div>
      <div class="modal-body">
        <h3><i class="icon-ok"></i>打赏成功</h3>
        <img src="/blogs/Public/Images/complete-pay-25426877089eb23bd76d9d0e6aad89c1.png" alt="Complete pay">
      </div>
    </div>
    <!-- 打赏成功end -->





    <!--文章喜欢和分享内容-->
    <!-- article meta bottom -->
    <div class="meta-bottom clearfix">
        <!--判断是否登录-->
        <?php if($is_login == 1): if($is_like == 1): ?><!--  Like Button -->
                <div class="like note-liked">
                    <div class="like-button">
                        <a id="like-note" class="like-content" href="javascript:void(0);">
                            <i class="fa fa-heart-o"></i>喜欢
                        </a>
                    </div>
                    <span id="likes-count" title="查看所有喜欢的用户">
                        <?php echo ($info["like_count"]); ?>
                    </span>
                </div>
            <?php else: ?>
                <!--  Like Button -->
                <div class="like ">
                    <div class="like-button">
                        <a id="like-note" class="like-content" href="javascript:void(0);">
                            <i class="fa fa-heart-o"></i>喜欢
                        </a>
                    </div>
                    <span id="likes-count" title="查看所有喜欢的用户">
                        <?php echo ($info["like_count"]); ?>
                    </span>
                </div><?php endif; ?>
        <?php else: ?>
            <!--  Like Button -->
            <div class="like">
                <div class="like-button">
                    <a class="like-content" href="<?php echo U('Home/Login/index');?>">
                        <i class="fa fa-heart-o"></i>喜欢
                    </a>
                </div>
                <span id="likes-count" title="查看所有喜欢的用户">
                    <?php echo ($info["like_count"]); ?>
                </span>
            </div><?php endif; ?>

        <!--  share group -->
        <div class="share-group pull-right">
            <a href="javascript:void((function(s,d,e,r,l,p,t,z,c){var%20f=&#39;http://v.t.sina.com.cn/share/share.php?appkey=1881139527&#39;,u=z||d.location,p=[&#39;&amp;url=&#39;,e(u),&#39;&amp;title=&#39;,e(t||d.title),&#39;&amp;source=&#39;,e(r),&#39;&amp;sourceUrl=&#39;,e(l),&#39;&amp;content=&#39;,c||&#39;gb2312&#39;,&#39;&amp;pic=&#39;,e(p||&#39;&#39;)].join(&#39;&#39;);function%20a(){if(!window.open([f,p].join(&#39;&#39;),&#39;mb&#39;,[&#39;toolbar=0,status=0,resizable=1,width=440,height=430,left=&#39;,(s.width-440)/2,&#39;,top=&#39;,(s.height-430)/2].join(&#39;&#39;)))u.href=[f,p].join(&#39;&#39;);};if(/Firefox/.test(navigator.userAgent))setTimeout(a,0);else%20a();})(screen,document,encodeURIComponent,&#39;&#39;,&#39;&#39;,&#39;http://cwb.assets.jianshu.io/notes/images/4886459/weibo/image_0569e8ff727f.jpg&#39;, &#39;推荐 八里唐 的文章《如何利用好暑假为下半年英语四六级考试做准备》（ 分享自 @简书 ）&#39;,&#39;http://www.jianshu.com/p/3756f50f93b7&#39;,&#39;页面编码gb2312|utf-8默认gb2312&#39;));" data-name="weibo">
                <i class="fa fa-weibo"></i><span>分享到微博</span>
            </a>
            <a data-toggle="modal" href="#share-weixin-modal" data-name="weixin">
                <i class="fa fa-weixin"></i><span>分享到微信</span>
            </a>
            <div class="more">
                <a href="javascript:void(0)" data-toggle="dropdown">更多分享<i class="fa fa-caret-down"></i></a>
                <ul class="dropdown-menu arrow-top">
                    <li>
                        <a href="http://cwb.assets.jianshu.io/notes/images/4886459/weibo/image_0569e8ff727f.jpg" target="_blank" data-name="changweibo"><i class="fa fa-arrow-circle-o-down"></i> 下载长微博图片</a>
                    </li>
                    <li>
                        <a data-name="tweibo" href="javascript:void(function(){var d=document,e=encodeURIComponent,r=&#39;http://share.v.t.qq.com/index.php?c=share&amp;a=index&amp;url=&#39;+e(&#39;http://www.jianshu.com/p/3756f50f93b7&#39;)+&#39;&amp;title=&#39;+e(&#39;推荐 八里唐 的文章《如何利用好暑假为下半年英语四六级考试做准备》（ 分享自 @jianshuio ）&#39;),x=function(){if(!window.open(r,&#39;tweibo&#39;,&#39;toolbar=0,resizable=1,scrollbars=yes,status=1,width=600,height=600&#39;))location.href=r};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})();">
                        <img src="/blogs/Public/Picture/tweibo.png" alt="Tweibo" /> 分享到腾讯微博
                        </a>
                    </li>
                    <li>
                        <a data-name="qzone" href="javascript:void(function(){var d=document,e=encodeURIComponent,r=&#39;http://sns.qzone.qq.com/cgi-bin/qzshare/cgi_qzshare_onekey?url=&#39;+e(&#39;http://www.jianshu.com/p/3756f50f93b7&#39;)+&#39;&amp;title=&#39;+e(&#39;推荐 八里唐 的文章《如何利用好暑假为下半年英语四六级考试做准备》&#39;),x=function(){if(!window.open(r,&#39;qzone&#39;,&#39;toolbar=0,resizable=1,scrollbars=yes,status=1,width=600,height=600&#39;))location.href=r};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})();">
                            <img src="/blogs/Public/Picture/qzone.png" alt="Qzone" /> 分享到QQ空间
                        </a>
                    </li>
                    <li>
                        <a data-name="twitter" href="javascript:void(function(){var d=document,e=encodeURIComponent,r=&#39;https://twitter.com/share?url=&#39;+e(&#39;http://www.jianshu.com/p/3756f50f93b7&#39;)+&#39;&amp;text=&#39;+e(&#39;推荐 八里唐 的文章《如何利用好暑假为下半年英语四六级考试做准备》（ 分享自 @jianshucom ）&#39;)+&#39;&amp;related=&#39;+e(&#39;jianshucom&#39;),x=function(){if(!window.open(r,&#39;twitter&#39;,&#39;toolbar=0,resizable=1,scrollbars=yes,status=1,width=600,height=600&#39;))location.href=r};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})();">
                            <img src="/blogs/Public/Picture/twitter.png" alt="Twitter" /> 分享到Twitter
                        </a>
                    </li>
                    <li>
                        <a data-name="facebook" href="javascript:void(function(){var d=document,e=encodeURIComponent,r=&#39;https://www.facebook.com/dialog/share?app_id=483126645039390&amp;display=popup&amp;href=http://www.jianshu.com/p/3756f50f93b7&#39;,x=function(){if(!window.open(r,&#39;facebook&#39;,&#39;toolbar=0,resizable=1,scrollbars=yes,status=1,width=450,height=330&#39;))location.href=r};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})();">
                            <img src="/blogs/Public/Picture/facebook.png" alt="Facebook" /> 分享到Facebook
                        </a>
                    </li>
                    <li>
                        <a data-name="google_plus" href="javascript:void(function(){var d=document,e=encodeURIComponent,r=&#39;https://plus.google.com/share?url=&#39;+e(&#39;http://www.jianshu.com/p/3756f50f93b7&#39;),x=function(){if(!window.open(r,&#39;google_plus&#39;,&#39;toolbar=0,resizable=1,scrollbars=yes,status=1,width=450,height=330&#39;))location.href=r};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})();">
                            <img src="/blogs/Public/Picture/google_plus.png" alt="Google plus" /> 分享到Google+
                        </a>
                    </li>
                    <li>
                        <a data-name="douban" href="javascript:void(function(){var d=document,e=encodeURIComponent,s1=window.getSelection,s2=d.getSelection,s3=d.selection,s=s1?s1():s2?s2():s3?s3.createRange().text:&#39;&#39;,r=&#39;http://www.douban.com/recommend/?url=&#39;+e(&#39;http://www.jianshu.com/p/3756f50f93b7&#39;)+&#39;&amp;title=&#39;+e(&#39;如何利用好暑假为下半年英语四六级考试做准备&#39;)+&#39;&amp;sel=&#39;+e(s)+&#39;&amp;v=1&#39;,x=function(){if(!window.open(r,&#39;douban&#39;,&#39;toolbar=0,resizable=1,scrollbars=yes,status=1,width=450,height=330&#39;))location.href=r+&#39;&amp;r=1&#39;};if(/Firefox/.test(navigator.userAgent)){setTimeout(x,0)}else{x()}})()">
                            <img src="/blogs/Public/Picture/douban.png" alt="Douban" /> 分享到豆瓣
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!--文章喜欢和分享内容end-->

    <!--文章微信分享提示-->
    <!-- Modals -->
    <div id="share-weixin-modal" class="modal hide fade share-weixin-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
        <div class="modal-body">
            <h5>打开微信“扫一扫”，打开网页后点击屏幕右上角分享按钮</h5>
        </div>
    </div>
    <div id="notebooks-menu" class="panel notebooks-menu arrow-top modal hide fade"><img class="loader-tiny" src="/blogs/Public/Picture/tiny.gif" alt="Tiny" /></div>
    <div id="collection-menu" class="panel collection-menu arrow-top modal hide fade"><img class="loader-tiny" src="/blogs/Public/Picture/tiny.gif" alt="Tiny" /></div>
    <!--文章微信分享提示end-->

    <!--文章喜欢的用户列表-->
    <div id="likes-modal" class="modal modal_new support_list-modal hide fade" style="text-align: center;" tabindex="-1" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h3>喜欢的用户</h3>
                </div>
                <div class="modal-body">
                    <ul class="unstyled users" id="likelist"></ul>
                </div>
            </div>
        </div>
    </div>
    <!--文章喜欢的用户列表end-->

    <!--文章评论列表-->
    <!-- Comments -->
    <div id="comments" class="comment-list clearfix">
        <div class="comment-head clearfix">
            <?php echo ($comment_num); ?>条评论
            <span class="order">
                （
                <a data-order="date" class="active" href="javascript:void(0)">按时间正序</a>·
                <a data-order="date desc" href="javascript:void(0)">按时间倒序</a>·
                <a data-order="zan desc" href="javascript:void(0)">按喜欢排序</a>
                ）
            </span>
            <?php if($is_login == 1): ?><a class="goto-comment pull-right" href="#pinglun">
                    <i class="fa fa-pencil"></i>添加新评论
                </a>
            <?php else: ?>
                <a class="goto-comment pull-right" data-signin-link="true" data-toggle="modal" href="<?php echo U('Home/Login/index');?>">
                    <i class="fa fa-pencil"></i>添加新评论
                </a><?php endif; ?>
        </div>
        <div id="comment-list">
            <?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="note-comment clearfix">
                    <div class="content">
                        <div class="meta-top">
                            <a href="<?php echo U('Home/Personal/index',array('id' => $vo[uid]));?>" class="avatar">
                                <?php if(empty($vo["head_img"])): ?><img src="/blogs/Public/Picture/e6716d6e36154d1199319a551b5b3d89.gif" alt="100" />
                                <?php else: ?>
                                    <img src="<?php echo ($vo["head_img"]); ?>" alt="100" /><?php endif; ?>
                            </a>
                            <p>
                                <a href="<?php echo U('Home/Personal/index',array('id' => $vo[uid]));?>" class="author-name"><?php echo ($vo["nickname"]); ?></a>
                            </p>
                            <span class="reply-time">
                            <small><?php echo ($vo["floor"]); ?>楼 · </small>
                            <a href="javascript:void(0)"><?php echo ($vo["date"]); ?></a></span>
                        </div>
                        <p><?php echo ($vo["content"]); ?></p>
                        <div class="comment-footer clearfix text-right">
                            <a href="javascript:void(0)" class="like pull-left likecomment" data-id="<?php echo ($vo["cmtid"]); ?>">
                                <?php if($vo["zan_status"] == 1): ?><i class="fa fa-heart"></i>喜欢<span class="zan">(<?php echo ($vo["zan"]); ?>)</span>
                                <?php else: ?>
                                    <i class="fa fa-heart-o"></i>喜欢<span class="zan">(<?php echo ($vo["zan"]); ?>)</span><?php endif; ?>
                                
                            </a>
                            <a href="javascript:void(0)" class="reply" data-nickname="<?php echo ($vo["nickname"]); ?>" data-id="<?php echo ($vo["cmtid"]); ?>">回复</a>

                            <?php if($vo["uid"] == $uid): ?><a class="delete" data-remote="true" data-commenter-id="<?php echo ($vo["cmtid"]); ?>" rel="nofollow" data-method="delete" data-type="json" href="">删除</a><?php endif; ?>
                            <?php if(!empty($vo["list"])): ?><div id="child<?php echo ($vo["cmtid"]); ?>" class="child-comment-list">
                            <?php else: ?>
                                <div id="child<?php echo ($vo["cmtid"]); ?>" class="child-comment-list" style="display:none;"><?php endif; ?>
                                <div  id="childlist<?php echo ($vo["cmtid"]); ?>">
                                <?php if(is_array($vo["list"])): $i = 0; $__LIST__ = $vo["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vos): $mod = ($i % 2 );++$i;?><div class="child-comment">
                                        <p class="text-left">
                                            <a href="<?php echo U('Home/Personal/index',array('id' => $vos[uid]));?>" class="blue-link"><?php echo ($vos["nickname"]); ?></a>：
                                            <?php if(!empty($vos["ruid"])): ?><a target="_blank" class="maleskine-author" href="<?php echo U('Home/User/index',array('id' => $vos[ruid]));?>">@<?php echo ($vos["user"]["nickname"]); ?></a><?php endif; ?>
                                            <?php echo ($vos["content"]); ?> 
                                        </p>
                                        <div class="child-comment-footer text-right clearfix">
                                            <a href="javascript:void(null)" class="reply" data-nickname="<?php echo ($vos["nickname"]); ?>" data-ruid="<?php echo ($vos["ruid"]); ?>" data-id="<?php echo ($vo["cmtid"]); ?>">回复
                                            
                                            </a>
                                            <?php if($vos["uid"] == $uid): ?><a class="delete" data-remote="true" data-commenter-id="<?php echo ($vos["cmtid"]); ?>" rel="nofollow" data-method="delete" data-type="json" href="">删除</a><?php endif; ?>
                                            <span class="reply-time pull-left">
                                                <a href="javascript:void(0)"><?php echo ($vos["date"]); ?></a>
                                            </span>
                                        </div>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                </div>
                                <div data-state="remaining-child-comments"></div>
                                <div class="comment-toolbar clearfix">
                                    <span class="pull-right">
                                        <a href="javascript:void(null)" class="reply" data-id="<?php echo ($vo["cmtid"]); ?>"><i class="fa fa-pencil"></i> 添加新回复</a>
                                    </span>
                                </div>
                            </div>
                            <form method="post" data-type="json" data-remote="true" accept-charset="UTF-8" action="" class="new-child-comment" id="from<?php echo ($vo["cmtid"]); ?>" style="display:none;">

                                <div class="comment-text">
                                    <textarea id="<?php echo ($vo["cmtid"]); ?>" name="comment[content]" class="mousetrap_c" placeholder="写下你的评论…" maxlength="2000"></textarea>
                                    <div>
                                        <input type="button" data-disable-with="提交中..." class="btn btn-small btn-info btn-info2" value="发 表" name="commit" >
                                        <div class="emoji">
                                            <span style="display: none" class="warning">
                                                <i class="fa fa-exclamation-circle"></i>
                                                <span class="warning-text"></span>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
        </div>

        
        <!-- 隐藏域  用来记录我点击回复时的当前评论id-->
        <input type="hidden" name="cmtid" id="cmtid" value=""> 
        <input type="hidden" value="<?php echo ($info["aid"]); ?>" name="aid" id="author">
        <?php if($is_login == 1): ?><a name="pinglun"></a>
            <input type="hidden" value="<?php echo ($info["aid"]); ?>" name="aid" id="aid">
            <div class="comment-text">
                <textarea id="comment_content" name="comment[content]" class="mousetrap" placeholder="写下你的评论…" maxlength="2000"></textarea>
                <div>

                    <!--自定义一个class类名用来触发click事件-->
                    <input type="button" class="btn btn-info " value="发 表" name="commit" onclick="tijiao()">
                    <span style="display: none" class="warning">
                        <i class="fa fa-exclamation-circle"></i>
                        <span class="warning-text"></span>
                    </span>
                </div>
            </div>
        <?php else: ?>




            <p class="signout-comment">
                <a class="btn btn-info" data-signin-link="true" data-toggle="modal" href="<?php echo U('Home/Login/index');?>">
                    登录后发表评论
                </a>
            </p><?php endif; ?>
    </div>
    <!--文章评论列表end-->
</div>

<!--文章相关专题推荐-->
    <div class="include-collection" style="height: 100px;">
        <div class="content">
            <div class="f_info">
                <div class="container_12">
                    <div class="grid_6">
                        <p style="margin-left: 150px;margin-top: 50px;margin-bottom: 40px;" class="copyright">© Breeze Store Theme, 2016. Collect from Beauty and the Beast</p>
                    </div><!-- .grid_6 -->
                    <div class="clear"></div>
                </div><!-- .container_12 -->
            </div><!-- .f_info -->
        </div>
    </div>
<!--文章相关专题推荐end-->

<input type="hidden" name="id" id="id" value="<?php echo ($info["aid"]); ?>">
<input type="hidden" name="uid" id="uid" value="<?php echo ($info["uid"]); ?>">

<script type="text/javascript">
    function tijiao(){
        var aid = $('#aid').val();
        var content = $('#comment_content').val();
        if(!content){
            alert('评论内容不能为空,请认真填写哦');
            return;
        }
        $.post('/blogs/index.php/Home/Particulars/add_comment',{aid:aid,content:content},function(data){
                if(data.result==1){
                    $('#comment_content').val('');
                    $("#comment-list").append(data.html);
                }else if(data.result==2){
                    /*var url = '<?php echo U("Home/Login/index");?>';
                    location.href = url;*/
                }
                
        },"json");
    }
    (function($) { 
        $(function() {
            //打开喜欢用户列表页面
            $('#likes-count').live('click',function(){
                var id = $('#id').val();
                $.get('/blogs/index.php/Home/Particulars/like_user',{id:id},function(data){
                    $('#likelist').html(data.html);
                    $('#likes-modal').addClass('in');
                    $('#likes-modal').css('display','block');
                },"json");
                
            });
            //关闭喜欢用户列表页面
            $('.close').live('click',function(){
                $('#likes-modal').removeClass('in');
                $('#likes-modal').css('display','none');
            });
            $('#like-note').live('click',function(){
                var id = $('#id').val();
                $.get('/blogs/index.php/Home/Particulars/edit_like',{id:id},function(data){
                    if(data.result==1){
                        $('.like').addClass('note-liked');
                        $('#likes-count').html(data.like_count);
                    }else if(data.result==2){
                        var url = '<?php echo U("Home/Login/index");?>';
                        location.href = url;
                    }else if(data.result==3){
                        alert('文章不存在');
                    }else{
                        $('.like').removeClass('note-liked');
                        $('#likes-count').html(data.like_count);
                    }
                },"json");
            });


            //打开打赏页面
            $('#ds').live('click',function(){
                $('#pay-modal').addClass('in');
                $('#pay-modal').css('display','block');
                
            });
            //关闭打赏页面
            $('.close').live('click',function(){
                $('#pay-modal').removeClass('in');
                $('#pay-modal').css('display','none');
            });

            //提交打赏
            $('#pay-now').live('click',function(){
                var id = $('#id').val();
                var point = $('#reward_amount_in_yuan').val();
                $.get('/blogs/index.php/Home/Particulars/ds_user',{id:id,point:point},function(data){
                    if(data.result==1){
                        alert('打赏的积分数不正确,请输入正确的积分数')
                    }else if(data.result==2){
                        $('#pay-modal').removeClass('in');
                        $('#pay-modal').css('display','none');
                        $('#success-pay').addClass('in');
                        $('#success-pay').css('display','block');

                    }else{
                        alert('积分不足,打赏失败');
                    }
                },'json');

            })
            //关闭打赏成功页面
            $('.close').live('click',function(){
                $('#success-pay').removeClass('in');
                $('#success-pay').css('display','none');
            });
            

            //关注作者
            $('#attention').live('click',function(){
                var id = $('#uid').val();
                $.get('/blogs/index.php/Home/Particulars/enit_attention',{id:id},function(data){
                    if(data.result==1){
                        $('#attention').removeClass('btn-success');
                        $('#attention i').removeClass('fa-plus');

                        $('#attention').addClass('following');
                        $('#attention i').addClass('fa-check');
                        $('#attention span').html('正在关注');
                    }else if(data.result==2){
                        var url = '<?php echo U("Home/Login/index");?>';
                        location.href = url;
                    }else if(data.result==3){
                        alert('用户不存在');
                    }else{
                        $('#attention').removeClass('following');
                        $('#attention i').removeClass('fa-check');

                        $('#attention').addClass('btn-success');
                        $('#attention i').addClass('fa-plus');

                        $('#attention span').html('添加关注');
                    }

                },"json");
            });


            //喜欢评论
            $('.likecomment').live('click',function(){
                var id = $(this).attr('data-id');
                var t = $(this);
                $.get('/blogs/index.php/Home/Particulars/like_comment',{id:id},function(data){
                    if(data.result==1){
                        t.find("i").attr("class", "fa fa-heart");
                        t.find("span").html('('+data.zan_count+')');
                    }else if(data.result==2){
                        var url = '<?php echo U("Home/Login/index");?>';
                        location.href = url;
                    }else if(data.result==3){
                        alert('评论不存在');
                    }else{
                        t.find("i").attr("class", "fa fa-heart-o");
                        t.find("span").html('('+data.zan_count+')');
                    }
                },"json");
            });

            //按order排序
            $('.order a').live('click',function(){
                var ord = $(this).attr('data-order');
                var o = $(this);
                var id = $('#id').val();
                $.get('/blogs/index.php/Home/Particulars/getList',{id:id,ord:ord},function(data){
                    if(data.result==1){
                        $('#comment-list').html(data.html);
                        
                        o.addClass('active').css({'color':'#000'}).siblings().removeClass('active').css({'color':'#ccc'});
                    } else {
                        alert('该文章不存在');
                    }
                },"json")
            });


            //回复评论
            $('.reply').live('click',function(){
                var cmtid = $(this).attr('data-id');
                var nickname = $(this).attr('data-nickname');
                //如果有昵称则显示昵称  如果没有则为空
                if(nickname){
                    $('#'+cmtid).val('@'+nickname+' ');
                }else{
                    $('#'+cmtid).val('');
                }
                //记录我当前点击的回复评论的评论ID
                $('#cmtid').val(cmtid);

                $('#from'+cmtid).css('display','block');
                
            });


            //发表按钮点击触发提交评论  这里被触发了
            $('.btn-info2').live('click',function(){
                //获取当前回复所属评论的id
                var cmtid = $('#cmtid').val();
                var aid = $('#author').val();
                var content = $('#'+cmtid).val();

                $.ajax({
                    url:"<?php echo U('Particulars/Reply');?>",
                    type:'post',
                    'data':{
                        aid:aid,
                        content:content,
                        cmtid:cmtid
                    },
                    dataType:'json',
                    success:function(data){
                        if(data.result==1){
                            $('#'+cmtid).val("");
                            //底下没有子评论是  div是隐藏的 评论发表成功后要改成显示
                            $('#child'+cmtid).css("display",'block');
                            $('#childlist'+cmtid).append(data.html);
                            $('#from'+cmtid).css('display','none');
                        } else {
                            var url = '<?php echo U("Home/Login/index");?>';
                            location.href = url;
                        }
                    }
                })
            });


            //删除评论操作   这个live是可以触发到的
            $('.delete').live('click',function(){
                 if(confirm("是否删除评论")){
                    var cmtid = $(this).attr('data-commenter-id');
                    var o = $(this);
                    $.get('/blogs/index.php/Home/Particulars/del',{cmtid:cmtid},function(data){

                        if(data.result==1){
                            //删除评论
                            o.parents('.note-comment').remove();
                        } else if(data.result==2){
                            //删除评论下的子评论
                            o.parents('.child-comment').remove();
                        } else if(data.result==3){
                            alert('删除失败');
                        }else{
                            var url = '<?php echo U("Home/Login/index");?>';
                            //location.href = url;
                        }
                    },"json")
                }
            })

        });
    })(jQuery);





</script>


			<script src="/blogs/Public/Scripts/base-ded41764c207f7ff545c28c670922d25.js"></script>
			<script src="/blogs/Public/Scripts/reading-base-7fc5fa7c6a3993128e61499f23be276d.js"></script>
			<script src="/blogs/Public/Scripts/note_show-1805bf39f59948b52870922039360dbb.js"></script>

		</div>
	</div>
</body>
</html>