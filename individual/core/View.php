<?php
class View{
	private $_tpl;
	private $_view;
	public function __construct($action,$method,$view='Smarty',$view_config = array()){
		$this->_tpl = APP_PATH.'Tpl/'.$action.'/'.$method.'.html';
		$this->_view = new $view();
		$view_config = $GLOBALS['config']['user_config']['view_config'];
		foreach($view_config[$view] as $key => $value){
			$this->_view->$key = $value;
		}
	}
	function assign($name,$value){
		$this->_view->assign($name,$value);
	}
	function display(){
		$this->_view->display($this->_tpl);
	}
}