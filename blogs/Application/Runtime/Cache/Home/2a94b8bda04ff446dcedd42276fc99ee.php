<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <link rel="stylesheet" media="all" href="/blogs/Public/Css/base-28859e35d389885d08837bc971ff742c.css"/>

    <link rel="stylesheet" media="all" href="/blogs/Public/Css/reading-bc4422e046bfdc9835cfcddb0c2de55d.css"/>
    <link rel="stylesheet" media="all" href="/blogs/Public/Css/base-read-mode-64acccf6966299cfa3d580140a2582fe.css"/>
    <link href="http://baijii-common.b0.upaiyun.com/icons/favicon.ico" rel="icon">
    <style type="text/css">
        .hedd{
            display:none;
        }
    </style>
    
</head>
<body class="output fluid zh cn mac mozilla reader-day-mode reader-font2" data-js-module="recommendation"
      data-locale="zh-CN">

<!-- nav 开始 -->
<div class="navbar navbar-jianshu shrink">
    <div class="dropdown">
        <a class="dropdown-toggle logo" id="dLabel" role="button" data-toggle="dropdown" data-target="#"
           href="<?php echo U('Index/index');?>"简</a>
        <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
            <li>
                <a href="<?php echo U('Home/index/index');?>"> <i class="fa fa-home"></i>
                    首页
                </a>
            </li>
            <li>
                <a href="<?php echo U('home/category/index');?>"> <i class="fa fa-th"></i>
                    专题
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
        </a>
        <!-- 下拉开始 -->
            <!-- 下拉结束 --><?php endif; ?>
</div>

<div class="navbar navbar-jianshu expanded">
    <div class="dropdown">
        <a class="active logo" role="button" data-original-title="个人主页" data-container="div.expanded" href="/blogs"> <b>简</b>
            <i class="fa fa-home"></i>
            <span class="title">首页</span>
        </a>
        <a data-toggle="tooltip" data-placement="right" data-original-title="专题" data-container="div.expanded"
           href="<?php echo U('home/category/index');?>"> <i class="fa fa-th"></i>
            <span class="title">专题</span>
        </a>
        <a class="ad-selector" href="/apps">
            <i class="fa fa-mobile"></i>
            <span class="title">下载手机应用</span>
        </a>
        <div class="ad-container ">
            <div class="ad-pop">
                <img class="ad-logo" src="/blogs/Public/Picture/114-8dae53b3bcea3f06bb139e329d1edab3.png" alt="114"/>
                <p class="ad-title">简书</p>
                <p class="ad-subtitle">交流故事，沟通想法</p>
                <img class="ad-qrcode" src="/blogs/Public/Picture/download-app-qrcode-053849fa25f9b44573ef8dd3c118a20f.png"
                     alt="Download app qrcode"/>
                <!-- <div>
                    <a class="ad-link" href="https://itunes.apple.com/cn/app/jian-shu/id888237539?ls=1&amp;mt=8">iOS</a>
                    ·
                    <a class="ad-link" href="http://downloads.jianshu.io/apps/haruki/JianShu-1.11.1.apk">Android</a>
                </div> -->
            </div>
        </div>
    </div>
    <!-- <div class="nav-user">
        <a href='#view-mode-modal' data-toggle='modal'>
            <i class="fa fa-font"></i>
            <span class="title">显示模式</span>
        </a>

        <a class="signin" data-signin-link="true" data-toggle="modal" data-placement="right" data-original-title="登录"
           data-container="div.expanded" href="<<?php echo ('Admin/Login/index');?>>
                ">
            <i class="fa fa-sign-in"></i>
            <span class="title">登录</span>
        </a>
    </div> -->
</div>

<div class="row-fluid">

    <div class="recommended">
        <!-- aside -->
        <div class="span3 left-aside">
            <div class="cover-img" style="background-image: url(/blogs/Public/Images/gm9aedgjtemque91ke_2.jpg)"></div>
            <div class="bottom-block">

                <h1>简书</h1>
                <h3>交流故事，沟通想法</h3>
                <p>一个基于内容分享的社区</p>
                <a class="btn btn btn-large btn-success" id="write-button" data-signin-link="true" data-toggle="modal"
                   href="<?php echo U('Home/Article/add');?>">提笔写篇文章</a>

            </div>
            <div class="img-info"><i class="fa fa-info"></i>
                <div class="info">
                    Photo by
                    <a target="_blank" href="http://unsplash.com/">unsplash</a>
                </div>
            </div>
        </div>
        <div class="span7 offset3">
            <div class="page-title" style="width:700px">
                <ul class="recommened-nav navigation clearfix" data-container='#list-container'
                    data-loader='.loader-tiny'>
                    <!-- 未登录状态 -->
                    <!-- Active: recommended notes list -->
                    <li class="active">
                        <a data-pjax="true" href="<?php echo U('Home/index/index');?>">发现</a>
                    </li>
                    <li class="bonus">
                        <a href="<?php echo U('Home/Category/index');?>"> <i class="fa fa-bars"></i>
                            专题
                        </a>
                    </li>
                    <li class="search" style="margin-right:150px">
                        <form class="search-form" target="_blank"  accept-charset="UTF-8" method="get">
                            <input name="utf8" type="hidden" value="&#x2713;"/>
                            <input type="search" name="q" id="q" placeholder="搜索" class="input-medium search-query"/>
        						<span class="search_trigger" id="ss">
        							<i class="fa fa-search"></i>
        						</span>
                        </form>
                    </li>
                </ul>
            </div>
            <div id="list-container">

                <ul class="unstyled clearfix sort-nav" id="collection-categories-nav"
                    data-js-module="collection-category" data-fetch-url="/recommendations/notes">

                    <li id="rm" class="active">
                        <a class="category" data-dimension="now" href="javascript:void(null);">热门</a>
                    </li>
                    <li id="zx">
                        <a class="category" data-dimension="now" href="javascript:void(null);">最新</a>
                    </li>
                    <li id="js">
                        <a class="category" data-dimension="now" href="javascript:void(null);">简书出品</a>
                    </li>
                </ul>

                <ul class="article-list thumbnails" id="btn-rm" style="display:block;">
                    <?php if(is_array($list_hot)): $i = 0; $__LIST__ = $list_hot;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="have-img">
                            <a class="wrap-img" href="<?php echo U('home/personal/index',array('id'=>$vo['uid']));?>">
                                <img src="/blogs/Uploads/aimg/<?php echo ($vo["iname"]); ?>" alt="300"/>
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
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>

                <ul class="article-list thumbnails" id="btn-zx" style="display:none;">
                    <?php if(is_array($list_new)): $i = 0; $__LIST__ = $list_new;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="have-img">
                            <a class="wrap-img" href="<?php echo U('home/personal/index',array('id'=>$vo['uid']));?>">
                                <img src="/blogs/Uploads/aimg/<?php echo ($vo["iname"]); ?>" alt="300"/>
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
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>

                <ul class="article-list thumbnails" id="btn-js" style="display:none;">
                    <?php if(is_array($list_js)): $i = 0; $__LIST__ = $list_js;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li class="have-img">
                            <a class="wrap-img" href="<?php echo U('home/personal/index',array('id'=>$vo['uid']));?>">
                                <img src="/blogs/Uploads/aimg/<?php echo ($vo["iname"]); ?>" alt="300"/>
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
                            </div>
                        </li><?php endforeach; endif; else: echo "" ;endif; ?>
                </ul>

                <ul class="article-list thumbnails" id="btn-search" style="display:none;">

                </ul>

                <ul class="article-list thumbnails" id="btn-mb" style="display:none;">
                    <li name="s_li" class="have-img">
                        <a name="url_a1" class="wrap-img" href="">
                            <img name="img_a" src="" alt="300"/>
                        </a>
                        <div>
                            <p class="list-top">
                                <a name="url_p" class="author-name blue-link" target="_blank" href=""></a>
                                <em>·</em>
                                <span class="time" data-shared-at="2016-07-18T21:44:11+08:00"></span>
                            </p>
                            <h4 class="title">
                                <a name="url_a2" target="_blank" href=""></a>
                            </h4>
                            <div class="list-footer">
                                <span name="s_yd"></span>
                                <span name="s_pl"></span>
                                <span name="s_xh"></span>
                                <span name="s_ds"></span>
                            </div>
                        </div>
                    </li>
                </ul>

                <div class="load-more">
                    <button class="ladda-button" style="background-color:#EF8D7C" id="btn-lei">
                        <span class="ladda-label">点击查看更多</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div id="time-machine-modal" class="modal hide fade share-weixin-modal time-machine-modal" tabindex="-1"
         role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"
         data-stats2015-url="http://www.jianshu.com/stats2015">

        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        </div>
    </div>
</div>
<!-- nav 结束 -->
<!-- footer  开始-->
<footer>
    <div class="footer-l">
        <p>
            <a href="http://www.jianshu.com/collection/jppzD2" target="_blank">关于简书</a>
            |
            <a target="_blank" href="/contact">联系我们</a>
            |
            <a href="http://www.jianshu.com/collection/fc488cd78374" target="_blank">作者成书计划</a>
            |
            <a href="http://www.jianshu.com/notebooks/547/latest" target="_blank">帮助中心</a>
            |
            <a href="http://jianshucom.taobao.com/" target="_blank">简书周边</a>
            |
            <a href="http://www.jianshu.com/p/cabc8fa39830">合作伙伴</a>
            |
        </p>
        <p>
            ©2012-2016
            <a href="/" target="_blank">简书</a>
            / 沪ICP备11018329号-5 /
            <a target="_blank" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=31010602000064">
                <img style="width: 18px; height: 18px"
                     src="/blogs/Public/Picture/beianbgs-8077429238867bbe0d8c66a2a3c298af.png" alt="Beianbgs"/>
                沪公网安备31010602000064号
            </a>
            <script src="/blogs/Public/Scripts/aq_auth.js"></script>
            </a>
        </p>
    </div>

    <div class="footer-r pull-right">
        <div class="app-download-btn">
            <a href="/apps">
                <img src="/blogs/Public/Picture/ios-bf05821ad054ccfb594fcc43a92a3753.png" alt="Ios"/>
            </a>
            <a href="/apps">
                <img src="/blogs/Public/Picture/android-63f9ad04e8805deae8d8e93ee45c5a2d.png" alt="Android"/>
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
                    <img src="/blogs/Public/Picture/jianshu_wechat_qrcode.jpg" alt="Jianshu wechat qrcode"/>
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

<script src="/blogs/Public/jquery-1.8.3.min.js"></script>
<script >
    $(function(){
        $('#ss').click(function () {



            $.ajax({
                type:'get',
                data: "search="+$('#q').val() ,
                cache:false,
                dataType:'json',
                url:'<?php echo U("home/index/get_searchlist");?>',
                success:function(info){

                    $("#btn-search li").remove();
                    $('#q').val(null);

                    for (var i=0;i<info.length ; i++)
                    {
                        $('#btn-mb li a').attr('href',"/blogs/home/particulars/index/id/"+info[i]['aid'])
                        $('#btn-mb li a img').attr('src',"/blogs/Uploads/aimg/"+info[i]['iname'])
                        $('#btn-mb li h4 a').attr('href',"/blogs/home/particulars/index/id/"+info[i]['aid'])
                        $('#btn-mb li h4 a').html(info[i]['title']);
                        $('#btn-mb li div p a').html(info[i]['nickname']);
                        $('#btn-mb li div p a').attr('href',"/blogs/home/personal/index/id/"+info[i]['uid']);
                        $('#btn-mb li div div span').eq(0).html("阅读 "+info[i]['click']);
                        $('#btn-mb li div div span').eq(1).html("· 评论  "+info[i]['comments']);
                        $('#btn-mb li div div span').eq(2).html("· 喜欢  "+info[i]['likes']);
                        $('#btn-mb li div div span').eq(3).html("· 打赏  "+info[i]['ds']);

                        $("#btn-mb li").clone().prependTo("#btn-search");

                    }
                    $("#btn-search li").eq(0).attr('display',"none")

                    //insertAfter

                }
            })
            $('#rm').removeClass('active');
            $('#zx').removeClass('active');
            $('#js').removeClass('active');
            $('#btn-rm').css('display','none');
            $('#btn-zx').css('display','none');
            $('#btn-js').css('display','none');
            $('#btn-search').css('display','block');
            loadli_rm();
        })

        $('#rm').click(function () {
            $('#rm').addClass('active');
            $('#zx').removeClass('active');
            $('#js').removeClass('active');
            $('#btn-rm').css('display','block');
            $('#btn-zx').css('display','none');
            $('#btn-js').css('display','none');
            loadli_rm();
        })
        $('#zx').click(function () {
            $('#rm').removeClass('active');
            $('#zx').addClass('active');
            $('#js').removeClass('active');
            $('#btn-rm').css('display','none')
            $('#btn-zx').css('display','block')
            $('#btn-js').css('display','none')
            loadli_zx();
        })
        $('#js').click(function () {
            $('#rm').removeClass('active');
            $('#zx').removeClass('active');
            $('#js').addClass('active');
            $('#btn-rm').css('display','none')
            $('#btn-zx').css('display','none')
            $('#btn-js').css('display','block')
            loadli_js();
        })
        loadli_rm()
        function loadli_rm(){
            var len = $('#btn-rm li').length;
//            console.log(len);
            if (len > 10 ) {
                $('#btn-rm li:gt(9)').css('display','none');
            }
        }
        function loadli_zx(){
            var len = $('#btn-zx li').length;
//            console.log(len);
            if (len > 10 ) {
                $('#btn-zx li:gt(9)').css('display','none');
            }
        }
        function loadli_js(){
            var len = $('#btn-js li').length;
//            console.log(len);
            if (len > 10 ) {
                $('#btn-js li:gt(9)').css('display','none');
            }
        }
        $('#btn-lei').click(function(){
            var len1 = $('#btn-rm li:visible').length;
            var len2 = $('#btn-zx li:visible').length;
            var len3 = $('#btn-js li:visible').length;
            // console.log(len);
            $('#btn-rm li').slice(len1,len1+10).css('display','block');
            $('#btn-zx li').slice(len2,len2+10).css('display','block');
            $('#btn-js li').slice(len3,len3+10).css('display','block');
        })


    })
</script>

</body>
</html>