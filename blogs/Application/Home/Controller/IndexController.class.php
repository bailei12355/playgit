<?php
namespace Home\Controller;

class IndexController extends PublicController
{
    public function index()
    {

        $list_js=$this->get_jslist();
        $list_hot=$this->get_list('click');
        $list_new=$this->get_list('time');
        $this->assign('list_js',$list_js);
        $this->assign('list_hot',$list_hot);
        $this->assign('list_new',$list_new);

        $this->display();
    }

    
    public function get_list($char)
    {
//        $cid = I('git.cid',0,'intval');
//        if ($cid == 0)
//        {
//
//        }
        $comment=M('comment');
        $like=M('like');
        $article=M('article');
        $article_pic=M('article_pic');
        $list =$article->table("blog_article a,blog_user_info ui")
            ->field("a.aid,a.uid,a.title,a.click,a.ds,ui.nickname")
            ->where("a.uid=ui.uid and a.is_delete = 0")
            ->order("{$char} desc")
            ->select();

        for ($i=0;$i<count($list);$i++)
        {
            $count=$comment->field("COUNT(cmtid) counts")
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $likes=$like->field("COUNT(aid) likes")
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $iname=$article_pic->field('iname')
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $list[$i]['comments']=$count[0]['counts'];
            $list[$i]['likes']=$likes[0]['likes'];
            if ($iname) {
                $list[$i]['iname'] = $iname[0]['iname'];
            }else{
                $list[$i]['iname'] = '1.png';
            }
        }
        return $list;
//        p($list);die();
    }

    public function get_jslist()
    {
//        $cid = I('git.cid',0,'intval');
//        if ($cid == 0)
//        {
//
//        }
        $comment=M('comment');
        $like=M('like');
        $article=M('article');
        $article_pic=M('article_pic');
        $list =$article->table("blog_article a,blog_user_info ui")
            ->field("a.aid,a.uid,a.title,a.click,a.ds,ui.nickname")
            ->where("a.uid=1 AND a.uid=ui.uid and a.is_delete = 0")
            ->order("time desc")
            ->select();

        for ($i=0;$i<count($list);$i++)
        {
            $count=$comment->field("COUNT(cmtid) counts")
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $likes=$like->field("COUNT(aid) likes")
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $iname=$article_pic->field('iname')
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $list[$i]['comments']=$count[0]['counts'];
            $list[$i]['likes']=$likes[0]['likes'];
            if ($iname) {
                $list[$i]['iname'] = $iname[0]['iname'];
            }else{
                $list[$i]['iname'] = '1.png';
            }
        }
        return $list;
//        p($list);die();
    }
    public function get_searchlist()
    {
        $str = I('get.search');
//        echo $str;
//        die;
//        $str = '1';
        $comment=M('comment');
        $like=M('like');
        $article=M('article');
        $article_pic=M('article_pic');
        $list =$article->table("blog_article a,blog_user_info ui")
            ->field("a.aid,a.uid,a.title,a.click,a.ds,ui.nickname")
            ->where("title like '%{$str}%' AND a.uid=ui.uid and a.is_delete = 0")
            ->order("time desc")
            ->select();

        for ($i=0;$i<count($list);$i++)
        {
            $count=$comment->field("COUNT(cmtid) counts")
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $likes=$like->field("COUNT(aid) likes")
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $iname=$article_pic->field('iname')
                ->where('aid='.$list[$i]['aid'])
                ->select();
            $list[$i]['comments']=$count[0]['counts'];
            $list[$i]['likes']=$likes[0]['likes'];
            if ($iname) {
                $list[$i]['iname'] = $iname[0]['iname'];
            }else{
                $list[$i]['iname'] = '1.png';
            }
        }
        echo json_encode($list);
//        p($list);die();
    }

}