<?php
class Db{
	public static $db;//保存db实例
	private $_sql;
	private $_msg;
	private $_conn;
	private function __construct(){
		$this->_sql = '';
		$this->_msg = '';
	}
	public function connect($config = array()){
		if(empty($config) || !is_array($config)){
			$this->_msg = '配置参数错误，数据库连接失败';
			return false;
		}
		extract($config);
		$this->_conn = mysql_connect($db_host,$db_user,$db_pass);
		if(!$this->_conn){
			$this->_msg = '数据库连接失败';
			return false;
		}
		mysql_select_db($db_name);
		mysql_query('SET NAMES '.$db_char,$this->_conn);
	}
	public static function getInstance(){
		if(self::$db){
			return self::$db;
		}else{
			self::$db = new self();
			return self::$db;
		}
	}
	public function query($sql){
		$this->_sql = $sql;
		$result = mysql_query($this->_sql);
		if(!$result){
			$this->_msg = mysql_error();
		}
		return $result;
	}
	public function getAll($sql){
		$result=$this->query($sql);
		if($result !== false){
			$arr = array();
			while($row=mysql_fetch_assoc($result)){
				$arr[] = $row;
			}
			mysql_free_result($result);
			return $arr;
		}else{
			return false;
		}
		
	}
	public function getRow($sql){
		$result = $this->query($sql);
		if($result !== false){
			$row = mysql_fetch_assoc($result);
			mysql_free_result($result);
			return $row;
		}
		return false;
	}
	public function getOne($sql){
		$result = $this->query($sql);
		if($result !== false){
			$row = mysql_fetch_row($result);
			return $row[0];
		}
		return false;
	}
	public function getCol($sql){
		$result = $this->query($sql);
		if($result !== false){
			$arr = array();
			while($row = mysql_fetch_assoc($result) !== false){
				$arr[] = $row[0];
			}
			return $arr;
		}
		return false;
	}
	public function insert($table = '',$data = array(),$where){
		$fields = $this->getCol('DESC '.$table);
		if(empty($data)){
			$this->_sql = '';
			$this->_msg = '待插入数据为空';
			return false;
		}
		$keys = $values = array();
		foreach($data as $key => $value){
			
			if(isset($fields[$key])){
				$keys[] = '`'.$key.'`';
				$values[] = '"'.$value.'"';
			}
		}
		$this->_sql = 'INSERT INTO '.$table.' ('.implode(',',$keys).') VALUES ('.implode(',',$values).') WHERE '.$where;
		return $this->query($this->_sql);
	}
	public function update($table = '',$data = array(),$where){
		$fields = $this->getCol('DESC '.$table);
		if(empty($data)){
			$this->_sql = '';
			$this->_msg = '待更新数据为空';
			return false;
		}
		$arr = array();
		foreach($data as $key => $value){
			
			if(isset($fields[$key])){
				$arr[] = '`'.$key.'` = "'.$value.'"';
			}
		}
		$this->_sql = 'UPDATE '.$table.'SET '.implode(',',$arr)." WHERE ".$where;
	}
	public function debug(){
		return array($this->_sql,$this->_msg);
	}
}