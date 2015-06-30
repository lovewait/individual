<?php
class testview{
	private $data;
	function assign($data){
		$this->data= $data;
	}
	function display(){
		echo $this->data;
	}
}