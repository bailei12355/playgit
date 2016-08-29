<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="cn">
<head>
    <meta charset="UTF-8">
    <title>评论管理表</title>
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/bootstrap-3.3.5/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/admin/font-awesome-4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="/app/item/blog/Public/css/bjy.css">
    <link rel="stylesheet" href="/app/item/blog/Public/home/Css/index.css">
    <!-- <link rel="stylesheet" href="/app/item/blog/Public/admin/css/index.css"> -->

</head>
<body>

    <div class="container ">
        <div class="row">
        <nav class="navbar">
                  <div class="container-fluid">
                    <div class="collapse navbar-collapse">
                    <!-- 搜索的form必须用get -->
                      <form action="<?php echo U('Comment/index');?>" class="navbar-form navbar-left">
                        <div class="form-group">
                          用户名:
                          <input type="text" name="nickname" class="form-control" placeholder="请输入用户名 " value="<?php if(!empty($str["nickname"])): echo ($str["nickname"]); endif; ?>">
                        </div>
                        <div class="form-group">
                            审核状态:
                            <select name="status" style="width:150px;height:30px;">
                                <option value="全部">全部</option>
                                <option value="0"  <?php if($str["status"] == '0'): ?>selected<?php endif; ?>>未审核</option>
                                <option value="1" <?php if($str["status"] == '1'): ?>selected<?php endif; ?>>已审核</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                      </form>
                    </div><!-- /.navbar-collapse -->
                  </div><!-- /.container-fluid -->
                </nav>
         <table class="table table-bordered table-hover">
            <tr style="text-align:center">
                <th>评论ID</th>
                <th style="text-align:center">文章名</th>
                <th style="text-align:center">用户名</th>
                <th style="text-align:center">评论内容</th>
                <th style="text-align:center">评论时间</th>
                <th style="text-align:center">评论喜欢数量</th>
                <th style="text-align:center">评论状态</th>
                <th style="text-align:center">审核状态</th>
                <th style="text-align:center">操作</th>
            </tr>
            <if>
            <?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr style="text-align:center">
                <td style="text-align:center"><?php echo ($v["cmtid"]); ?></td>
                <td style="text-align:center"><?php echo ($v["title"]); ?></td>
                <td style="text-align:center"><?php echo ($v["nickname"]); ?></td>
                <td style="text-align:left"><?php echo ($v["content"]); ?></td>
                <td style="text-align:center"><?php echo ($v["date"]); ?></td>
                <td style="text-align:center"><?php echo ($v["zan"]); ?></td>
                <td style="text-align:center"><a><?php echo ($type_arr[$v['is_delete']]); ?></a></td>
                <td style="text-align:center"><a><?php echo ($status_arr[$v['status']]); ?></a></td>
                <td style="text-align:center">
                    <p><a href="<?php echo U('Comment/edit',array('cmtid'=>$v['cmtid']));?>" class="btn btn-sm btn-primary">编辑</a></p>
                </td>
            </tr>
            <?php if(is_array($v["list"])): $i = 0; $__LIST__ = $v["list"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                <td style="text-align:center"><?php echo ($vo["cmtid"]); ?></td>
                <td style="text-align:center"><?php echo ($vo["title"]); ?></td>
                <td style="text-align:center"><?php echo ($vo["nickname"]); ?></td>
                <td style="text-align:left">|----<?php echo ($vo["content"]); ?></td>
                <td style="text-align:center"><?php echo ($vo["data"]); ?></td>
                <td style="text-align:center"><?php echo ($vo["zan"]); ?></td>
                <td style="text-align:center"><a><?php echo ($type_arr[$vo['is_delete']]); ?></a></td>
                <td style="text-align:center"><a><?php echo ($status_arr[$vo['status']]); ?></a></td>
                <td style="text-align:center">
                    <p><a href="<?php echo U('Comment/edit',array('cmtid'=>$vo['cmtid']));?>" class="btn btn-sm btn-primary">编辑</a></p>
                </td>
            </tr><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
         </table>
         <h3><?php echo ($page); ?></h3>
        </div><!-- END row -->
    </div><!-- END container -->
    


<script src="/app/item/blog/Public/js/jquery-2.0.0.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/bootstrap.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/pace.min.js"></script>
<script src="/app/item/blog/Public/admin/bootstrap-3.3.5/js/index.js"></script>
<script src="/app/item/blog/Public/admin/js/index.js"></script>
</body>
</html>