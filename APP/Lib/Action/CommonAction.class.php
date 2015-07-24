<?php

class CommonAction extends Action{
	public function _initialize(){
		if(session('uid')){
    		$data = M('user')->where(array('id'=>session('uid')))->find();
    		$this->user = $data;
		}

		$cate = M('category')->select();
		$this->cate = $cate;

	}
}