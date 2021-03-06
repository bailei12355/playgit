<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>全部用户</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <style>
        #warp{
            width:94%;
            height: auto;
            overflow: hidden;
            margin: 20px auto;
            padding: 10px 20px;
            border:1px solid #ccc;
        }
        #warp .add-app{
            display:block;
            width:100px;
            height:28px;
            line-height: 28px;
            text-align: center;
            background:#670678;
            color: #fff;
            border-radius: 4px;
        }
        #warp .app{
            padding: 10px;
            margin-top: 20px;
            border:1px solid #f6f6f6;
        }
        #warp .app p{
            height: 30px;
            line-height: 30px;
        }
        #warp .app strong{
            color: #0b99d8;
            font-size: 20px;
        }
        #warp .app dl{
            margin:10px 0;
            border:1px solid #dcdcdc;
            height: auto;
            overflow: hidden;
        }
        #warp .app dl dt{
             display: block;
             height:36px;
             line-height: 36px;
             background-color: #e6e6fa;
             text-indent: 10px;
        }
        #warp .app dl dt strong{
            font-size:16px;
            color:#61a1fa;
        } 
        #warp .app dl dd{
            padding:10px;
            float:left;
        }

    </style>
</head>
<body>
    <form action="<?php echo U('Admin/Rbac/setAccess');?>" method="post">
        <div id="warp">
            <a href="<?php echo U('Admin/Rbac/role');?>" class="add-app">返回</a>
                <?php if(is_array($node)): foreach($node as $key=>$app): ?><div class="app">
                        <p>
                            <strong><?php echo ($app['title']); ?></strong>
                            <input type="checkbox" name="access[]" value="<?php echo ($app["id"]); ?>_1" level="1" <?php if($app['access']): ?>checked = 'checked'<?php endif; ?>>
                        </p>

                        <?php if(is_array($app["child"])): foreach($app["child"] as $key=>$action): ?><dl>
                                <dt>
                                    <strong><?php echo ($action["title"]); ?></strong>
                                    <input type="checkbox" name="access[]" value="<?php echo ($action["id"]); ?>_2" level="2" <?php if($action['access']): ?>checked = 'checked'<?php endif; ?>>
                                </dt>

                                <?php if(is_array($action["child"])): foreach($action["child"] as $key=>$method): ?><dd>
                                    <span><?php echo ($method["title"]); ?></span>
                                    <input type="checkbox" name="access[]" value="<?php echo ($method["id"]); ?>_3" level="3" <?php if($method['access']): ?>checked='checked'<?php endif; ?>>
                                </dd><?php endforeach; endif; ?>
                            </dl><?php endforeach; endif; ?>
                    </div><?php endforeach; endif; ?>
            <input type="hidden" name="rid" value="<?php echo ($rid); ?>">
            <input type="submit" value="保存添加" style="display: block; margin:0 auto; cursor: pointer;">
        </div>
    </form>
    <script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
    <script src="/app/item/blog/Public/jquery-1.8.3.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
    <script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
    <script src="/app/item/blog/Public/admin/js/index.js"></script>
    <script>
        $(function(){
            $('input[level=1]').click(function(){
                var inputs = $(this).parents('.app').find('input');
                $(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
            })
            $('input[level=2]').click(function(){
                var inputs = $(this).parents('dl').find('input');
                $(this).attr('checked') ? inputs.attr('checked', 'checked') : inputs.removeAttr('checked');
            })
        })
    </script>
</body>
</html>