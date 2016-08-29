<?php
namespace Home\Controller;
use Think\Controller;

/*
*文章详情页
 */
class ParticularsController extends Controller
{
	public function index(){
		$id = I('get.id/d');
		//文章信息model
		$article = D('article');
                        $is_article = $article->getArticle($id);
                        if(empty($is_article)){
                            $this->redirect("Error/404");
                            exit;
                        };
    
		//用户信息model
		$user = D('UserInfo');

                        //用户积分model
                        $pt = D('user');
                        $point = $_SESSION['home']['point'];



		//文章喜欢信息model
		$like = D('like');

		//用户关注信息model
		$attention = D('AttentionAuthou');

		//文章打赏信息model
		$ds = D('ds');

		//文章评论信息model
		$comment = D('comment');

                        //专题信息model
                        $category = D('AttentionCategory');
                        


                        //获取文章评论总数
                        $comment_num = $comment->getCommentCount($id);
                        //dump($_SESSION);



		//查询文章具体信息
		$info = $article->getInfo($id);
    	


		//查询文章作者具体信息
		$userinfo = $user->getUserInfo($info['uid']);


		//给文章的点击数量加1
		$article->addClick($id);

		//判断是否登录
		if($_SESSION['home']['uid']){
			$is_login = 1;
			//判断是否关注文章作者
			$is_attention = $attention->getUserAttention($info['uid'],$_SESSION['home']['uid']);
			//判断是否喜欢文章
			$is_like = $like->getUserLike($id,$_SESSION['home']['uid']);
		}else{
			$is_login = 0;
			$is_attention = 0;
			$is_like = 0;
		}

		

		//获取文章评论信息列表
		$comment_list = $comment->getList($id);


		
    	            $this->assign('info',$info);
		$this->assign('userinfo',$userinfo);
                        $this->assign('comment_num',$comment_num);
                        $this->assign('point',$point);


		$this->assign('is_login',$is_login);
		$this->assign('is_attention',$is_attention);
		$this->assign('is_like',$is_like);

		$this->assign('ds_list',$ds_list);
		$this->assign('like_list',$like_list);
		$this->assign('comment_list',$comment_list);

		$this->assign('uid',$_SESSION['home']['uid']);
                        $this->display('Particulars/article');
	}

	//ajax查询最新的喜欢用户列表
	public function like_user(){
		$id = I('get.id/d');
		//文章喜欢信息model
		$like = D('like');
		//获取文章喜欢用户列表
		$like_list = $like->getLikeList($id);
		$this->assign('like_list',$like_list);
		$html = $this->fetch();
		$msg['html'] = $html;
		echo json_encode($msg);exit;
	}


        //ajax打赏操作
        public function ds_user()
        {
        	//获取的打赏文章id
            $id = I('get.id/d');
            //获取打赏的积分数
            $point = I('get.point/d');
            //dump($point);

            if($point < 1){
            	//打赏的积分数不正确
            	$msg['result'] = 1;
            }

            $uid = $_SESSION['home']['uid'];
            $user = D('user');
            //获取用户积分信息
            $user_point = $user->getPoint($uid);
            /*dump($user_point);exit;*/
            //判断用户当前积分是大于等于打赏的积分
            if($point <= $user_point){
                $userfo = D('user_info');
                //获取作者信息
                $uif = $userfo->getUser_Info($id);
            	//打赏
            	//当前用户的where条件
            	$u_where = array(
            		'uid' => $uid,
            		);
            	//作者的where条件
            	$where = array(
            		'uid' => $uif['uid'],
            		);
            	//当前用户积分减去
            	$user->where($u_where)->setDec('point',$point);
                $_SESSION['home']['point'] -= $point;
            	//作者积分加上
            	$user->where($where)->setInc('point',$point);
            	//记录打赏日志表
            	$ds = M('ds');
            	$data['uid'] = $uid;
            	$data['aid'] = $id;
            	$data['ds_point'] = $point;
            	$ds->add($data);
            	$msg['result'] = 2;

            }else{
            	//积分不足,打赏失败
            	$msg['result'] = 3;
            }
            echo json_encode($msg);
            exit;
        }

	//ajax执行喜欢文章操作
	public function edit_like(){
		$id = I('get.id/d');
		if($_SESSION['home']['uid']){
			//文章信息model
			$article = D('article');
			//查询文章具体信息
			$info = $article->getInfo($id);
			if($info){
				$uid = $_SESSION['home']['uid'];
				$like = D('like');
				$msg['result'] = $like->editLike($info,$uid);
				$msg['like_count'] = $like->getLikeCount($id);
			}else{
				//文章不存在
				$msg['result'] = 3;
			}
		}else{
			//未登录
			$msg['result'] = 2;
		}
		echo json_encode($msg);exit;
	}
	//ajax执行关注用户操作
	public function enit_attention(){
		$id = I('get.id/d');
		if($_SESSION['home']['uid']){
			//用户信息model
			$user = D('UserInfo');
			//查询用户具体信息
			$info = $user->getUserInfo($id);
			if($info){
				$uid = $_SESSION['home']['uid'];
				$attention = D('AttentionAuthou');
				$msg['result'] = $attention->editAttention($uid,$id);
			}else{
				//用户不存在
				$msg['result'] = 3;
			}
		}else{
			//未登录
			$msg['result'] = 2;
		}
		echo json_encode($msg);exit;
	}

	//ajax执行喜欢评论操作
	public function like_comment(){
		$id = I('get.id/d');
		if($_SESSION['home']['uid']){
			//评论信息model
			$comment = D('comment');

			$uid = $_SESSION['home']['uid'];
			//评论喜欢信息model
			$c_like = D('CommentLike');
			$msg['result'] = $c_like->editLike($id,$uid);
			//查询评论具体信息
			$info = $comment->getInfo($id);
			$msg['zan_count'] = $info['zan'];
		}else{
			//未登录
			$msg['result'] = 2;
		}
		echo json_encode($msg);exit;
	}

	//ajax执行添加评论操作
	public function add_comment(){

		if($_SESSION['home']['uid']){
			$aid = I('post.aid');
			$content = I('post.content');
			$uid = $_SESSION['home']['uid'];
			$comment = D('comment');

            		//添加评论
            		$info = $comment->addComment($aid,$uid,$content);
            		//传递评论信息
            		$this->assign('info',$info);
            		$this->assign('user',$_SESSION['home']);
            		$html = $this->fetch();
            		$msg['html'] = $html;
            		$msg['result'] = 1;
		}else{
			//未登录
			$msg['result'] = 2;
		}
		echo json_encode($msg);exit;
	}



    //ajax执行回复评论操作
    public function Reply(){
        if($_SESSION['home']['uid']){
            $aid = I('post.aid');
            $cmtid = I('post.cmtid');
            $content = I('post.content');

            $uid = $_SESSION['home']['uid'];
            $comment = D('comment');
            $where = array(
                'aid' => $aid,
                'cmtid' => $cmtid
            );
            $info = $comment->where($where)->find();
            //dump($info);exit;
            if ($info){
            //正则匹配出nickname
	$preg = "/@(.*)\s.*/i";
	preg_match($preg,$content,$arr);
	$nickname = $arr[1];
	//dump($nickname);
	//根据nickname拿到被回复人uid 也就是评论表里的ruid信息
	$user = D('UserInfo');
	$u_uid = $user->getUser_uid($nickname);
	if($u_uid){
		$ruid = $u_uid['uid'];
	}else{
		$ruid = 0;
	}
	


	//格式化content信息  把@用户昵称从评论回复信息里删除
	$content = str_replace("@".$nickname.' ', '', $content);

                //添加评论
                $info = $comment->addComment($aid,$uid,$content,$cmtid,$ruid);

                //传递评论信息
                $this->assign('info',$info);
                $this->assign('user',$_SESSION['home']);
                $this->assign('ruser',$u_uid);
                $html = $this->fetch();
                $msg['html'] = $html;
                $msg['result'] = 1;
                M('user')->where("uid={$_SESSION['home']['uid']}")
                ->setInc('point',2);
                $_SESSION['home']['point'] = $_SESSION['home']['point'] + 2;
            }else{
                //评论失败
                $msg['result'] = 3;
            }
        }else{
            //未登录
            $msg['result'] = 2;
        }
        echo json_encode($msg);
        exit;
    }


    public function index2()
    {
    	//获取文章ID
    	$id = I('get.id/d');
    	$data = M('article a')->where("aid = '$id'")->join('blog_user u on a.uid=u.uid')->field('a.uid auid,a.aid aaid,a.title atitle,a.content acontent,a.click aclick,a.time atime,u.uname uuname')->find();
    	//该文章被喜欢的总数
    	$like = M('like')->where("aid = '$id'")->count();
    	//该文章被关注总量
    	$attention = M('attention_acticle')->where("atd_aid = '$id'")->count();
    	//该文章评论数
    	$comment = M('comment')->where("aid = '$id'")->count();

    	//喜欢改文章的用户展示
    	$list = M('like')->where("aid = '$id' and u.uid=l.uid=uio.uid")->table('blog_user u,blog_like l,blog_user_info uio')->field('u.uname username,uio.head_img uhimg,l.uid luid,l.liketime ltime')->select();
    	/*dump($list);
    	dump($like);*/
    	//echo M('like')->getLastSql();
    	$this->assign('attention',$attention);
    	$this->assign('list',$list);
    	$this->assign('comment',$comment);
    	$this->assign('like',$like);
    	$this->assign('data',$data);
        $this->display('Particulars/article');
    }

    public function getList()
    {
    	//获取文章ID
    	$id = I('get.id/d');
    	$order = I('get.ord');
    	//文章信息model
	$article = D('article');
	//查询文章具体信息
	$info = $article->getInfo($id);
    	if ($info){
    		$comment = D('comment');
    		//根据ID获取文章评论列表
    		$comment_list = $comment->getList($id,$pageno,$pagenum,$order);
                        //uid传入到模板，用来判断是否有删除按钮
                        $this->assign('uid',$_SESSION['home']['uid']);
    		$this->assign('comment_list',$comment_list);
    		$html = $this->fetch();
    		$com['html'] = $html;
    		$com['result'] = 1;
    	} else {
    		//该文章不存在
			$com['result'] = 2;
    	}
    	echo json_encode($com);
    	exit;
    }



    public function del()
    {
        if($_SESSION['home']['uid']){
            $id = I('get.cmtid/d');
            $uid = $_SESSION['home']['uid'];
            $comment = D('comment');
            $info = $comment->getInfo($id);
            if($uid == $info['uid']){
	            if($comment->del($id) > 0){
	            	//判断是正常评论还是评论下的子评论
	            	if($info['pid'] == 0){
						//删除评论
		                $msg['result'] = 1;
	            	}else{
						//删除评论下子评论
		                $msg['result'] = 2;
	            	}
	            	M('user')->where("uid={$_SESSION['home']['uid']}")
                                                ->setDec('point',2);
                    $_SESSION['home']['point'] = $_SESSION['home']['point'] - 2;
	            }else{
	            	//删除失败
	                $msg['result'] = 3;
	            }

	        }else{
	        	//该用户不存在
            	$msg['result'] = 4;
        	}
        	
        }
		echo json_encode($msg);
		exit;
    }

    //ajax执行关注用户操作
    public function edit_attion()
    {
        $id = I('get.id/d');
        if($_SESSION['home']['uid']){
            //用户信息model
            $user = D('UserInfo');
            //查询用户具体信息
            $info = $user->getUserInfo($id);
            if($info){
                $uid = $_SESSION['home']['uid'];
                $attention = D('AttentionCategory');
                $msg['result'] = $attention->editAttention($uid,$id);
            }else{
                //用户不存在
                $msg['result'] = 3;
            }
        }else{
            //未登录
            $msg['result'] = 2;
        }
        echo json_encode($msg);exit;
    }


}



