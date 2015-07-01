<?php
class View{
	private $_list;
	private $_tpl;
	public function __construct($action,$method){
		$this->_list = array();
		$this->_tpl = $action.'/'.$method;
	}
	function assign($name,$value){
		$this->_list[$name] = $value;
	}
	function display(){
		$content = file_get_contents(APP_PATH.'/Tpl/'.$this->_tpl.'.html');
		// var_dump($this->_list);
		preg_match_all('/\{\$(.*?)\}/', $content,$matches);
		if($matches[1]){
			// var_dump($matches);
			foreach($matches[1] as $key => $value){
				if(isset($this->_list[$value])){
					$content=str_replace($matches[0][$key], $this->_list[$value], $content);
				}
			}
		}
		echo $content;
	}
}