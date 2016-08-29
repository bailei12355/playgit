<?php
namespace Home\Controller;

use \Think\Controller;

class PublicController extends Controller
{
    /***
     * 权限判断
     * 需要登陆后操作的页面使用
     */
    public function pageload()
    {
        if (!empty(session('home'))) {
            if (empty(session('home.uid')) || empty(session('home.uid'))) {
                $this->error('尚未登录', U('Home/Login/index'));
                exit;
            }
        } else {
            $this->error('尚未登录', U('Home/Login/index'));
            exit;
        }
    }

    public function upload($path)
    {
        $upload = new \Think\Upload();// 实例化上传类
        $upload->maxSize = 3145728;// 设置附件上传大小
        $upload->exts = array('jpg', 'gif', 'png', 'jpeg','bmp');// 设置附件上传类型
        $upload->rootPath = './Uploads'; // 设置附件上传根目录
        $upload->savePath = '/'.$path.'/'; // 设置附件上传（子）目录
        $upload->saveName = time() . '_' . mt_rand(0, 9);
        $upload->replace = true;
        $upload->autoSub = false;
        // 上传文件
        $info = $upload->upload();
        if ($info) {
//            $info = $upload->getUploadFileInfo();
            return array(true,$info[$path]['savename']);
        } else {
            return array(false,$upload->getError());
        }
    }

}