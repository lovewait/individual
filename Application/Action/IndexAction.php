<?php
class IndexAction{
	function index(){
		$model = M(str_replace('Action', '', __CLASS__));
		$data = $model->index();
		$this->display($data);
	}
	function test(){
		$model = M(str_replace('Action', '', __CLASS__));
		$data = $model->test();
		$this->display($data);
	}
	function display($data){
		$this->_view->display($data);
	}
}