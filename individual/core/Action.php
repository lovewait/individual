<?php
class Action{
	protected $_action_name;
	public function __construct($action_name){
		$this->_action_name = $action_name;
	}
	public function assign($name,$value){
		$this->_view->assign($name,$value);
	}
	public function display(){
		$this->_view->display();
	}
}