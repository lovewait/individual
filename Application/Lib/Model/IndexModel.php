<?php
class IndexModel extends Model{
	function index(){
		return 'indexmodel';
	}
	function test(){
		return $this->_db->getAll("select * from test");
	}
}