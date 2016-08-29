<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/base-28859e35d389885d08837bc971ff742c.css"/>
    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/amazeui.min.css"/>
    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/reading-bc4422e046bfdc9835cfcddb0c2de55d.css"/>
    <link rel="stylesheet" media="all" href="/app/item/blog/Public/Css/base-read-mode-64acccf6966299cfa3d580140a2582fe.css"/>
    <script type="text/javascript" src="/app/item/blog/Public/ckeditor/ckeditor.js"></script>

</head>
<body class="output fluid zh cn mac mozilla reader-day-mode reader-font2" data-js-module="recommendation"
      data-locale="zh-CN">

<!-- nav 开始 -->
<div class="navbar navbar-jianshu shrink">
    <div class="dropdown">
        <a class="dropdown-toggle logo" id="dLabel" role="button" data-toggle="dropdown" data-target="#"
           href="javascript:void(0)">简</a>
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


<div class="navbar navbar-jianshu expanded">
    <div class="dropdown">
        <a class="active logo" role="button" data-original-title="个人主页" data-container="div.expanded" href="<?php echo U('Home/index/index');?>"> <b>简</b>
            <i class="fa fa-home"></i>
            <span class="title">首页</span>
        </a>
        <a data-toggle="tooltip" data-placement="right" data-original-title="专题" data-container="div.expanded"
           href="<?php echo U('Home/Category/index');?>"> <i class="fa fa-th"></i>
            <span class="title">专题</span>
        </a>
        <a class="ad-selector" href="/apps">
            <i class="fa fa-mobile"></i>
            <span class="title">下载手机应用</span>
        </a>
        <div class="ad-container ">
            <div class="ad-pop">
                <img class="ad-logo" src="/app/item/blog/Public/Picture/114-8dae53b3bcea3f06bb139e329d1edab3.png" alt="114"/>
                <p class="ad-title">简书</p>
                <p class="ad-subtitle">交流故事，沟通想法</p>
                <img class="ad-qrcode" src="/app/item/blog/Public/Picture/download-app-qrcode-053849fa25f9b44573ef8dd3c118a20f.png"
                     alt="Download app qrcode"/>
                <div>
                    <a class="ad-link" href="">iOS</a>
                    ·
                    <a class="ad-link" href="">Android</a>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row-fluid">
    <div style="background-color: #ccc;width: 200px ; hight:100px;">
        <div class="recommended">
            <!-- aside -->
            <div class="span3 left-aside">
                <div class="cover-img" style="background-image: url(/app/item/blog/Public/Images/gm9aedgjtemque91ke_2.jpg)"></div>
                <div class="bottom-block">

                    <h1>简书</h1>
                    <h3>交流故事，沟通想法</h3>
                    <p>一个基于内容分享的社区</p>

                </div>
                <div class="img-info"><i class="fa fa-info"></i>
                    <div class="info">
                        Photo by
                        <a target="_blank" href="http://unsplash.com/">unsplash</a>
                    </div>
                </div>
            </div>
        </div>

        <div id="time-machine-modal" class="modal hide fade share-weixin-modal time-machine-modal"
             tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
             data-stats2015-url="http://www.jianshu.com/stats2015">

            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
        </div>
    </div>
</div>
<div class="row-fluid">

    <div class="recommended">
        <!-- aside -->
        <div class="span7 offset3" style="width: 100%;">
            <!-- content start -->
            <div class="admin-content am-g">
                <!--<div class="admin-content-body">-->
                    <div class="am-cf am-padding am-padding-bottom-0">
                        <div class="am-fl am-cf"><strong class="am-text-primary am-text-lg">提笔写文</strong>
                            / <small>ARTICLE</small></div>
                    </div>

                    <hr/>

                    <div class="am-g">
                        <div class="am-u-sm-12 am-u-md-4 am-u-md-push-8">
                        </div>

                        <div class="am-u-sm-12 am-u-md-8 am-u-md-pull-4">
                            <form class="am-form am-form-horizontal" action="<?php echo U('Article/insert');?>"
                                  method="post" enctype="multipart/form-data">

                                <br>

                                <div class="am-form-group">
                                    <label for="title" class="am-u-sm-3 am-form-label am-vertical-align-middle">标题:</label>
                                    <div class="am-u-sm-9">
                                        <input type="text" id="title" placeholder="标题 / title"
                                               name="title" style=" height: 40px;">
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-vertical-align-middle">专题:</label>
                                    <div class="am-u-sm-9">
                                        <select  class="am-selected" name="cid" style=" height: 40px;">
                                            <?php if(is_array($cates)): $i = 0; $__LIST__ = $cates;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option value="<?php echo ($v["cid"]); ?>"><?php echo ($v["cname"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                    </div>
                                </div>

                                <div class="am-form-group">
                                    <label class="am-u-sm-3 am-form-label am-vertical-align-middle">配图:</label>
                                    <div class="am-u-sm-7">
                                        <div class="am-form-group am-form-file">
                                            <button type="button" class="am-btn am-btn-default am-btn-sm" style=" height: 40px;">
                                                <i class="am-icon-cloud-upload"></i> 选择文章配图 </button>
                                            <input type="file" name="aimg" >
                                        </div>
                                    </div>
                                </div>


                                <div class="am-form-group">
                                    <label for="content" class="am-u-sm-3 am-form-label am-vertical-align-middle">正文:</label>
                                    <div class="am-u-sm-9 am-vertical-align-middle" >
                                        <textarea id="content" cols="20" rows="2" class="ckeditor" name="content"></textarea>
                                    </div>
                                </div>



                                <div class="am-form-group">
                                    <div class="am-u-sm-9 am-u-sm-push-3">
                                        <button type="submit" class="am-btn am-btn-primary">确认发表</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
            </div>
        </div>
    </div>

</div>
<!-- nav 结束 -->
<!-- footer  开始-->
<footer>
    <div class="footer-l">
        <p>
            <a href="" target="_blank">关于简书</a>
            |
            <a target="_blank" href="/contact">联系我们</a>
            |
            <a href="" target="_blank">作者成书计划</a>
            |
            <a href="" target="_blank">帮助中心</a>
            |
            <a href="" target="_blank">简书周边</a>
            |
            <a href="">合作伙伴</a>
            |
        </p>
        <p>
            ©2012-2016
            <a href="/" target="_blank">简书</a>
            / 沪ICP备11018329号-5 /
            <a target="_blank" href="">
                <img style="width: 18px; height: 18px"
                     src="/app/item/blog/Public/Picture/beianbgs-8077429238867bbe0d8c66a2a3c298af.png" alt="Beianbgs"/>
                沪公网安备31010602000064号
            </a>
            </a>
        </p>
    </div>

    <div class="footer-r pull-right">
        <div class="app-download-btn">
            <a href="/apps">
                <img src="/app/item/blog/Public/Picture/ios-bf05821ad054ccfb594fcc43a92a3753.png" alt="Ios"/>
            </a>
            <a href="/apps">
                <img src="/app/item/blog/Public/Picture/android-63f9ad04e8805deae8d8e93ee45c5a2d.png" alt="Android"/>
            </a>
        </div>
        <div>
            关注我们:
            <a href="http://weibo.com/jianshuio" target="_blank"> <i class="fa fa-weibo"></i>
            </a>
            <a class="weixin" href="#share-weixin-modal" data-toggle="modal"> <i class="fa fa-weixin"></i>
            </a>
            <a href="https://twitter.com/jianshucom" target="_blank">
                <i class="fa fa-twitter"></i>
            </a>
            <br>
            <a href="http://windows.microsoft.com/zh-CN/internet-explorer/download-ie" class="upgrade-ie">本网站不支持
                IE6/IE7，如果您希望继续使用 IE 浏览器，请升级至IE8及以上版本</a>
        </div>
    </div>

    <!--modal-->
    <div class="modal hide fade share-weixin-modal" id="share-weixin-modal" tabindex="-1" role="dialog"
         aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <div class="modal-content">
                <div class="modal-body">
                    <p>关注我们的微信公众号，获得每日好文推荐。微信中搜索「简书」或者扫一扫下方二维码：</p>
                    <img src="/app/item/blog/Public/Picture/jianshu_wechat_qrcode.jpg" alt="Jianshu wechat qrcode"/>
                </div>
            </div>
        </div>
    </div>

</footer>
<!-- footer  结束-->

<div id="flash" class="hide"></div>

<div id="view-mode-modal" tabindex="-1" class="modal hide read-modal" aria-hidden="false"
     data-js-module='view-mode-modal'>
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
<script type="application/javascript">
    CKEDITOR.replace('content');
</script>
</body>
</html>