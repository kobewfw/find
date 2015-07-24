<?php
class MemberAction extends CommonAction{
	public function index(){
		$group = M('group')->where(array('uid'=>session('uid')))->select();
		$this->group = $group;
		$this->display();
	}

	public function checkGroup(){
		if(!$this->isAjax()){
			halt('您访问的页面不存在');
		}
		$gname = $_POST['gname'];
		if(M('group')->where(array('gname'=>$gname))->find()){
			echo 'false';
		} else{
			echo 'true';
		}
	}

	public function addGroup(){
		if(!$this->isAjax()){
			halt('您访问的页面不存在');
		}

		$gname = $_POST['gname'];
		$gintro = $_POST['gintro'];
		$gcat = $_POST['gcat'];

		$data = array(
			'uid'=>session('uid'),
			'gname'=>$gname,
			'gintro'=>$gintro,
			'gcat'=>$gcat,
			);
		if(M('group')->data($data)->add()){
			echo '1';
		} else {
			echo '0';
		}
	}
}











?>