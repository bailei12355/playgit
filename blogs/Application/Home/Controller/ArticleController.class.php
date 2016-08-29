<?php
namespace Home\Controller;

class ArticleController extends PublicController
{
    public function add()
    {
        $this->pageload();
        $cate = M('category');
        $cates=$cate->select();
        $this->assign("cates",$cates);
//        p($cates);
//        exit();
        $this->display();
    }
    

    public function insert()
    {
        $re=$this->upload('aimg');
        if (!$re[0]){
            $this->error($re[1]);
            exit;
        }else{
            $_POST['iname']=$re[1];
        }
        
        $art = D('article');
        if ($art -> add_article()){
            M('user')->where("uid={$_SESSION['home']['uid']}")
                ->setInc('point',10);
            $this->success('添加成功', U('Home/Index/index'));
        }else{
            $this->error('添加失败');
        }
       
        
    }
}