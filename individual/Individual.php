<?php
class Individual{

	public static function run(){
		define ('ROOT_PATH',dirname(dirname(str_replace('\\','/',__FILE__))));//兼容5.2，如果是5.3以上可以使用__DIR__但是不建议这么用，因为系统中的数据库类用的还是mysql扩展，而mysql扩展到php5.5就不再支持了
		spl_autoload_register(array(__CLASS__,'autoload'));
		date_default_timezone_set('PRC');
		if (!get_magic_quotes_gpc()){
			$_POST = self::addslashes_deep($_POST);
			$_GET = self::addslashes_deep($_GET);
			$_COOKIE = self::addslashes_deep($_COOKIE);
		}
		$_action = isset($_GET['action']) ? trim($_GET['action']) : 'Index';
		$_method = isset($_GET['method']) ? trim($_GET['method']) : 'index';
		$GLOBALS['config']= self::load_config();
		Db::getInstance()->connect($GLOBALS['config']['user_config']['db_config']);//想要调用数据库连接资源使用Db::$db
		C($_action,$_method);
	}
	public static function autoload($class){
		$core_class = array('Action','Model','View','Db');
		if(in_array($class,$core_class)){
			require ROOT_PATH.'/Individual/Core/'.$class.'.php';
		}elseif(substr($class,-6) == 'Action'){
			require APP_PATH.'/Lib/Action/'.$class.'.php';
		}elseif(substr($class, -5) == 'Model'){
			require APP_PATH.'/Lib/Model/'.$class.'.php';
		}else{
			// die('找不到对应文件:'.$class);//比较坑的是，在调用class_exist的时候，也会执行此方法
		}
	}
	public static function addslashes_deep($value){
		return is_array($value) ? array_map(__METHOD__, $value) : addslashes($value);
	}
	public static function load_config(){
		$sys_config = require ROOT_PATH.'/Individual/Conf/config.php';
		$user_config = require APP_PATH.'/Conf/config.php';
		$autoload_list = $sys_config['autoload_list'];
		foreach($autoload_list as $file){
			self::load($file);
		}
		return array('sys_config'=>$sys_config,'user_config'=>$user_config);
	}
	public static function load($file){
		//require文件
		if(substr(basename($file,'.php'),-3) == 'lib'){
			$truename = str_replace('.lib.php','', $file);
			require_once ROOT_PATH.'/Individual/Ext/'.$truename.'.lib.php';
		}elseif(substr(basename($file,'.php'),-5) == 'class'){
			$truename = str_replace('.class.php','', $file);
			require_once ROOT_PATH.'/Individual/Ext/'.$truename.'.class.php';
		}else{
			require_once ROOT_PATH.'/Individual/Core/'.$file;
		}
	}
}
