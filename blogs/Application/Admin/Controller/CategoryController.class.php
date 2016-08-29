<?php  
namespace Admin\Controller;
use Admin\Controller\AdminController;
/**
 * 分类管理
 */
class CategoryController extends AdminController
{
	 //定义数据表
    
	public function index()
	{
		$data = M('category')->select();
		// p($data);die;
		$this->assign('data',$data);
		$this->display();


	}
	public function add()
	{
		$this->display();
	}
	public function insert()
	{
		// p($iarr);die;
		if (empty($_POST)) {
			$this->error('表单不能为空');
			exit;
		}
		$iarr=$this->upload("cimg");
		if (!$iarr[0]) {
			$this->error($iarr[1]);
		} else {
			$_POST['cimg'] = $iarr[1];
		}
		M('category')->create();
		if (M('category')->add() > 0 ) {
            $this->success('添加成功',U('index'));
        } else {
            $this->error('添加失败');
        }
	}
	public function delete()
	{
		$cid = I('get.cid',0,'intval');
	       // echo $uid;
	       $id = M('category')->delete($cid);
	       if ($id > 0) {
	       		$this->success('删除成功');
	       }else{
	       		$this->error('删除失败');
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
	public function edit()
	{	
		$cid = I('get.cid',0,'intval');
		$data = M('category')->where(array('cid'=>$cid))->find();
		$this->assign('data',$data);
		$this->display();
	}
	public function save()
	{
		if (!IS_POST) {
			E('非法操作');
		}		
		if (empty($_POST)) {
			$this->error('数据不能为空');
		}
		$iarr=$this->upload("cimg");
		if (!$iarr[0]) {
			$this->error($iarr[1]);
		} else {
			$_POST['cimg'] = $iarr[1];
		}
		M('category')->create();
		if (M('category')->save() > 0) {
			$this->success('编辑成功',U('Admin/Category/index'));
		}else{
			$this->error('编辑失败');
		}

	}

}