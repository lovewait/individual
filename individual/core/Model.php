<?php
class Model{
	protected $_db;
	public function __construct($model_name){
		$this->_db = Db::$db;
	}
}