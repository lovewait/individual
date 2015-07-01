<?php
class Individual{
	public static function run(){
		define ('ROOT_PATH',dirname(__DIR__));
		spl_autoload_register(array(__CLASS__,'autoload'));
		date_default_timezone_set('PRC');
		if (!get_magic_quotes_gpc()){
			$_POST = self::addslashes_deep($_POST);
			$_GET = self::addslashes_deep($_GET);
			$_COOKIE = self::addslashes_deep($_COOKIE);
		}
		$_action = isset($_GET['action']) ? trim($_GET['action']) : 'Index';
		$_method = isset($_GET['method']) ? trim($_GET['method']) : 'index';
		self::load_config();
		C($_action,$_method);
	}
	public static function autoload($class){
		$core_class = array('Action','Model','View');
		if(in_array($class,$core_class)){
			require ROOT_PATH.'/Individual/Core/'.$class.'.php';
		}elseif(substr($class,-6) == 'Action'){
			require APP_PATH.'/Lib/Action/'.$class.'.php';
		}elseif(substr($class, -5) == 'Model'){
			require APP_PATH.'/Lib/Model/'.$class.'.php';
		}else{
			die('找不到对应文件:'.$class);
		}
	}
	public static function addslashes_deep($value){
		return is_array($value) ? array_map(__METHOD__, $value) : addslashes($value);
	}
	public static function load_config(){
		$config = require ROOT_PATH.'/Individual/Conf/config.php';
		$autoload_list = $config['autoload_list'];
		foreach($autoload_list as $file){
			self::load($file);
		}
	}
	public static function load($file){
		//require文件
		if($truename=substr(basename($file),-3) == 'lib'){
			require_once ROOT_PATH.'/Individual/Ext/'.$truename.'.lib.php';
		}elseif($truename = substr(basename($file),-5) == 'class'){
			require_once ROOT_PATH.'/Individual/Ext/'.$truename.'.class.php';
		}else{
			require_once ROOT_PATH.'/Individual/Core/'.$file;
		}
	}
}
