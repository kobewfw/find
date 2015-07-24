<?php
// 本类由系统自动生成，仅供测试用途
class IndexAction extends CommonAction {
    public function index(){


		import('ORG.Util.Page');
		$count = D('Huati')->count();
		$Page  = new Page($count,20);		
		$show  = $Page->show();

		$list = D('Huati')->relation(true)->order('htime desc')->limit($Page->firstRow.','.$Page->listRows)->select();


		$this->assign('huati',$list);// 赋值数据集

		$this->assign('page',$show);// 赋值分页输出

		$this->display(); // 输出模板

	}




	/***注册**/
	public function register(){
		if(!$this->isAjax()){
			halt('您访问的页面不存在');
		}

		$email = $_POST['email'];
		$nicheng = $_POST['nicheng'];
		$password = $_POST['password'];
		$data = array(
			'email'=>$email,
			'nicheng'=>$nicheng,
			'password'=>$password
		);

		$uid = M('user')->add($data);
		if(M('user')->add($data)){
			session('uid',$uid);
			cookie('uid',$uid);
			echo '1';
		} else {
			echo '0';
		}


	}
	/***注册**/
	public function login(){
		if(!$this->isAjax()){
			halt('您访问的页面不存在');
		}

		$email = $_POST['email'];
		$password = $_POST['password'];
		$data = array(
			'email'=>$email,
			'password'=>$password
		);
		$data = M('user')->where($data)->find();
		$uid = $data['id'];
		if(M('user')->where($data)->find()){
			session('uid',$uid);
			cookie('uid',$uid);
			echo '1';
		} else {
			echo '0';
		}


	}
	public function checkEmail(){
		if(!$this->isAjax()){
			halt('您访问的页面不存在');
		}

		$email = $_POST['email'];
		if(M('user')->where(array('email'=>$email))->select()){
			echo 'false';
		} else{
			echo 'true';
		}
	}

	public function checkNicheng(){
		if(!$this->isAjax()){
			halt('您访问的页面不存在');
		}

		$nicheng = $_POST['nicheng'];
		if(M('user')->where(array('nicheng'=>$nicheng))->select()){
			echo 'false';
		} else{
			echo 'true';
		}
	}


	public function checkUser(){
		if(!$this->isAjax()){
			halt('您访问的页面不存在');
		}

		$email = $_POST['email'];
		$password = $_POST['password'];

		if($password == M('user')->where(array('email'=>$email))->getField('password')){
			echo 'true';
		} else{
			echo 'false';
		}
	}


	public function logout(){
		session('uid',null);
		cookie('uid',null);
		session(null); 
		cookie(null);
		header("Content-type: text/html;charset=utf-8");
		redirect( __APP__.'/Index/index',3,'安全退出中...');
	}


	/**点赞功能的实现**/
	public function dianZan(){
		if(!$this->isAjax()){
			halt('此页面不存在');
		}
		$hid = $_POST['hid'];
		if(M('huati')->where(array('hid'=>$hid))->setInc('znum')){
			echo 1;
		} else {
			echo 0;
		}
	}

}