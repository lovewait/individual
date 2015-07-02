<?php
class IndexAction extends Action{
	function index(){
		$model = M($this->_action_name);
		$data = $model->index();
		$this->assign('xxx',$data);
		$this->assign('yyy','this is a test');
		$this->assign('zzz','i want to test preg_match_all function in index.html');
		$this->display();
	}
	function test(){
		$model = M($this->_action_name);
		$this->assign('data','this is test.html');
		$data = $model->test();
		// var_dump($data[0]['name']);
		$this->assign('data',$data);
		$this->display();
	}
}