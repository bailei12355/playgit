<?php
//admin下的命名空间记得设置成admin的  你刚刚设置的是home的
namespace Admin\Model;
use Think\Model;

class CommentModel extends Model
{
    //编辑用户评论
    public function getInfo($cmtid)
    {
        $where = array(
            'c.cmtid' => $cmtid,
            'a.aid' =>array('EXP', '=c.aid'),
            'c.uid' =>array('EXP', '=uif.uid'),
            );
        $table = array(
            'blog_article' => 'a',
            'blog_user_info' => 'uif',
            'blog_comment' => 'c',
            );
        $list = $this->where($where)->table($table)->find();
        return $list;
    }

    //获取所有文章评论列表
    public function getList($map=array(),$page='1',$pagenum='5'){

        $comment = M('comment c');
        //设定查询条件，查出文章下的一级评论
        $where = array(
            'a.aid' =>array('EXP', '=c.aid'),
            'c.uid' =>array('EXP', '=uif.uid'),
            'c.pid' => 0,
        );
        if(!empty($map['nickname'])){
            $where['uif.nickname'] = array('like','%'.$map['nickname'].'%');
        }
        if(isset($map['status'])){
            $where['c.status'] = $map['status'];
        }
        $table = array(
            'blog_article' => 'a',
            'blog_user_info' => 'uif',
            'blog_comment' => 'c',
            );
        //多表联查查询出来用户信息
        $list = $comment->table($table)
                     ->where($where)->page($page.','.$pagenum)->select();

        //循环一级评论列表  查出每个一级评论下的子评论
        foreach($list as $k=>$v){
            $list[$k]['list'] = $this->getChildList($v['cmtid'],$map);
        }
        return $list;
    }

    //根据条件获取数据总数
    public function getCount($map){
        $comment = M('comment c');
        //设定查询条件，查出文章下的一级评论
        $where = array(
            'a.aid' =>array('EXP', '=c.aid'),
            'c.uid' =>array('EXP', '=uif.uid'),
            'c.pid' => 0,
        );
        if(!empty($map['nickname'])){
            $where['uif.nickname'] = array('like','%'.$map['nickname'].'%');
        }
        if(isset($map['status'])){
            $where['c.status'] = $map['status'];
        }
        $table = array(
            'blog_article' => 'a',
            'blog_user_info' => 'uif',
            'blog_comment' => 'c',
            );
        //多表联查查询出来用户信息
        $count = $comment->table($table)
                     ->where($where)->count();
        return $count;
    }

    //根据评论id获取评论下子评论信息
    public function getChildList($pid,$map=array()){
        $user = D('UserInfo');
        $comment = M('comment c');
        //设定查询条件，查出子评论信息
        $where = array(
            'a.aid' =>array('EXP', '=c.aid'),
            'c.uid' =>array('EXP', '=uif.uid'),
            'c.pid' => $pid,
        );
        if(!empty($map['nickname'])){
            $where['uif.nickname'] = array('like','%'.$map['nickname'].'%');
        }
        if(isset($map['status'])){
            $where['c.status'] = $map['status'];
        }
        $table = array(
            'blog_article' => 'a',
            'blog_user_info' => 'uif',
            'blog_comment' => 'c',
            );
        //多表联查查询出来用户信息
        $list = $comment->table($table)
                 ->where($where)->select();
        //循环子评论列表，补全针对回复评论所属的用户ID
        foreach($list as $k=>$v){
            //$list[$k]['user'] = $user->getUserInfo($v['ruid']);xi
        }
        return $list;
    }


    public function updata()
    {
        $where = array(
            'c.cmtid' => $cmtid,
            'a.aid' =>array('EXP', '=c.aid'),
            'c.uid' =>array('EXP', '=uif.uid'),
            );
        $table = array(
            'blog_article' => 'a',
            'blog_user_info' => 'uif',
            'blog_comment' => 'c',
            );
        $list = $this->where($where)->table($table)->add();
        return $list;
    }
}