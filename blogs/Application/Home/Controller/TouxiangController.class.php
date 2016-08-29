<?php
namespace Home\Controller;

class TouxiangController extends PublicController
{
    public function index()
    {
        $iname = $this->upload('touxiang');
        $user1 = $_SESSION['home']['uid'];
        $user = M('user_info');
        $user->head_img = $iname['1'];
        $user->where("uid = '{$user1}'")->save();
        $this->assign('vcode', $vcode);
        $this->display('Grzx/index');
    }
}