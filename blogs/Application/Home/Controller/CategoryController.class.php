<?php
namespace Home\Controller;

class CategoryController extends PublicController
{
    public function index()
    {
        $cate = M('category');
        $art = M("article");
        $catelist = $cate->select();
        for ($i=0;$i<count($catelist) ; $i++)
        {
            $count=$art->field("COUNT(aid) counts")
                ->where('is_delete=0 and cid='.$catelist[$i]['cid'])
                ->select();
            $catelist[$i]['count']=$count[0]['counts'];
        }
//        p($catelist);die;
        $this->assign('list',$catelist);
        $this->display();
    }

    public function details()
    {
        $cid = I('get.id');
        $categoryname=M('category')->field('cname')
            ->where("cid={$cid}")
            ->select();
        $this->assign("cname",$categoryname[0]['cname']);
        $this->assign("list",$this->get_list($cid));
        $this->display();
    }

    public function get_list($cid)
    {
        $comment=M('comment');
        $like=M('like');
        $article=M('article');
        $article_pic=M('article_pic');
        $list =$article->table("blog_article a,blog_user_info ui")
            ->field("a.aid,a.uid,a.title,a.click,a.ds,ui.nickname")
            ->where(" a.uid=ui.uid and a.is_delete=0 and a.cid={$cid}")
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
    }
}