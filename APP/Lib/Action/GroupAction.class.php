<?php
class GroupAction extends CommonAction{
	public function index(){
		$gid = $_GET['gid'];
		$group = M('group')->where(array('gid'=>$gid))->find();
		$this->group = $group;
		
		import('ORG.Util.Page');
		$count = M('huati')->count();
		$Page  = new Page($count,5);		
		$show  = $Page->show();

		$list = M('huati')->where(array('gid'=>$gid))->order('htime desc')->limit($Page->firstRow.','.$Page->listRows)->select();


		$this->assign('huati',$list);// 赋值数据集

		$this->assign('page',$show);// 赋值分页输出
		$this->display();
	}

	public function addHuati(){
		if(!$this->isAjax()){
			halt('页面不存在');
		}
		$data = array(
			'title'=>$_POST['title'],
			'content'=>$_POST['content'],
			'gid'=>$_POST['gid'],
			'uid'=>session('uid'),
			'htime'=>Date('Y-m-d H:m:s',time()),
			);
		if(M('huati')->data($data)->add()){
			echo 1;
		} else {
			echo 0;
		}
	}
}











?>