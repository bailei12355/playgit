<?php
namespace Home\Controller;
use Think\Controller;

class dengluController extends Controller
{
    public function index()
    {
    	if (empty($_SESSION['home'])) {
    		$this->error('请先登录!',U('Home/login/index'));
    		exit;
    	}
    }
}