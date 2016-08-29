<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html>
<html lang="cn">
<head>
	<meta charset="utf-8">
  	<title>简书</title>

  	<link rel="stylesheet" media="all" href="/blogs/Public/Css/base-28859e35d389885d08837bc971ff742c.css" />

    <link rel="stylesheet" media="all" href="/blogs/Public/Css/reading-bc4422e046bfdc9835cfcddb0c2de55d.css" />
  	<link rel="stylesheet" media="all" href="/blogs/Public/Css/base-read-mode-64acccf6966299cfa3d580140a2582fe.css" />
  	<script src="Scripts/jquery-1.8.3.min.js"></script>
  	<script src="Scripts/modernizr-613ea63b5aa2f0e2a1946e9c28c8eedb.js"></script>
  	<link href="http://baijii-common.b0.upaiyun.com/icons/favicon.ico" rel="icon">
</head>
<body class="output no-fluid zh cn reader-day-mode reader-font2" data-js-module="" data-locale="zh-CN">
	<div class="navbar navbar-jianshu shrink">
		<div class="dropdown">
			<a class="dropdown-toggle logo" id="dLabel" role="button" data-toggle="dropdown" data-target="#" href="<?php echo U('Home/index/index');?>">简</a>
			<ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
				<li>
					<a href="<?php echo U('Home/index/index');?>"> <i class="fa fa-home"></i>
						首页
					</a>
				</li>
				<li>
					<a href="<?php echo U('Home/Category/index');?>"> <i class="fa fa-th"></i>
						专题
					</a>
				</li>
				<li>
					<a href="/user_invitations">
						<i class="fa fa-money"></i>
						发钱啦
					</a>
				</li>
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
	        </a><?php endif; ?>
	</div>

	<div class="navbar navbar-jianshu expanded">
		<div class="dropdown">
			<a class="active logo" role="button" data-original-title="个人主页" data-container="div.expanded" href="<?php echo U('Home/index/index');?>"> <b>简</b> <i class="fa fa-home"></i>
				<span class="title">首页</span>
			</a>
			<a data-toggle="tooltip" data-placement="right" data-original-title="专题" data-container="div.expanded" href="<?php echo U('Home/Category/index');?>"> <i class="fa fa-th"></i>
				<span class="title">专题</span>
			</a>
			<a class="ad-selector" href="/apps">
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
						<a class="ad-link" href="https://itunes.apple.com/cn/app/jian-shu/id888237539?ls=1&amp;mt=8">iOS</a>
						·
						<a class="ad-link" href="http://downloads.jianshu.io/apps/haruki/JianShu-1.11.1.apk">Android</a>
					</div>
				</div>
			</div>
		</div>
		<div class="nav-user">
			<a href='#view-mode-modal' data-toggle='modal'>
				<i class="fa fa-font"></i>
				<span class="title">显示模式</span>
			</a>

		</div>
	</div>

	<div class="container">

		<div class="login-page">
			<div class="logo">
				<img src="/blogs/Public/Picture/img_logo-25ff4bee2e56411470b83c636a7a0dad.png" alt="Img logo" />	
			</div>
			<h4 class="title">
				<span>
					<a class="active" data-pjax="true" href="<?php echo ('index');?>
                ">登录</a> <b>·</b>
					<a class="" data-pjax="true" href="<?php echo U('/Home/signup/index');?>">注册</a>
				</span>
			</h4>
			<div id="pjax-container">

				<div class="sign-in">
					<form class="form-horizontal" data-js-module="sign-in" action="<?php echo U('Home/login/login');?>" accept-charset="UTF-8" method="post">

						<div class="input-prepend domestic ">
							<span class="add-on"> <i class="fa fa-user"></i>
							</span>
							<input type="text" name="uname" id="sign_in_name" value="" class="span2" placeholder="用户名" />	
						</div>

						<div class="input-prepend password ">
							<span class="add-on"> <i class="fa fa-unlock-alt"></i>
							</span>
							<input type="password" name="pwd" id="sign_in_password" class="span2" placeholder="密码" />	
						</div>

<!-- 						<div class="input-prepend password ">
							<span class="add-on"> <i class="fa fa-unlock-alt"></i>
							</span>
							<input type="text" name="yzm" id="sign_in_yzm" class="span2" placeholder="验证码" />	
						</div>
						<div><img title="点 我 刷 新" style="cursor:pointer" onclick="this.src=this.src+'?i='+Math.random()" src="<?php echo U('signup/Verify');?>"></div> -->
						<br>

						<input type="hidden" name="sign_in[is_foreign]" id="sign_in_is_foreign" value="false" />	

						<button class="ladda-button submit-button" data-color="blue">
							<span class="ladda-label">登 录</span>
						</button>

						<div class="control-group text-left">
							<input type="checkbox" name="sign_in[remember_me]" id="sign_in_remember_me" value="true" checked="checked" />	
							记住我
							<a href="<?php echo U('/Home/login/password');?>">忘记密码</a>
						</div>

					</form>
				</div>

			</div>
			<div class="login-sns">
				<p>您还可以通过以下方式直接登录</p>
				<ul class="login-sns">
					<li class="weibo">
						<a href="/users/auth/weibo">
							<i class="fa fa-weibo"></i>
						</a>
					</li>
					<li class="qq">
						<a href="/users/auth/qq_connect">
							<i class="fa fa-qq"></i>
						</a>
					</li>
					<li class="douban">
						<a href="/users/auth/douban">
							<i class="fa fa-douban"></i>
						</a>
					</li>
					<li class="google">
						<a href="/users/auth/google_oauth2">
							<i class="fa fa-google-plus"></i>
						</a>
					</li>
					<li class="wechat">
						<a href="/users/auth/wechat">
							<i class="fa fa-wechat"></i>
						</a>
					</li>
				</ul>
			</div>
		</div>

    </div>
    <div id="flash" class="hide"></div>

    <div id="view-mode-modal" tabindex="-1" class="modal hide read-modal" aria-hidden="false" data-js-module='view-mode-modal'>
    	<div class="btn-group change-background" data-toggle="buttons-radio">
    		<a class="btn btn-daytime active" data-mode="day" href="javascript:void(null);"> <i class="fa fa-sun-o"></i>
    		</a>
    		<a class="btn btn-nighttime " data-mode="night" href="javascript:void(null);"> <i class="fa fa-moon-o"></i>
    		</a>
    	</div>
    	<div class="btn-group change-font" data-toggle="buttons-radio">
    		<a class="btn font " data-font="font1" href="javascript:void(null);">宋体</a>
    		<a class="btn font hei active" data-font="font2" href="javascript:void(null);">黑体</a>
    	</div>
    	<div class="btn-group change-locale" data-toggle="buttons-radio">
    		<a class="btn font active" data-locale="zh-CN" href="javascript:void(null);">简</a>
    		<a class="btn font hei " data-locale="zh-TW" href="javascript:void(null);">繁</a>
    	</div>
    </div>
</body>
</html>