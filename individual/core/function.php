<?php
function C($action,$method){
	$action = !empty($action) ? trim($action) : 'index';
	$method = !empty($method) ? trim($method) : 'index';
	$actionClassName = ucwords($action).'Action';

	$actionClass = new $actionClassName();
	$actionClass->_view = V($action);
	$actionClass->$method();

}
function M($model){
	$modelClassName = ucwords($model).'Model';
	$modelClass = new $modelClassName();
	return $modelClass;
}
function V($view){
	$viewClassName = ucwords($view).'View';
	$viewClass = new $viewClassName();
	return $viewClass;
}
function auto_load($class){
	if(substr($class,-6) == 'Action'){
		require APP_PATH.'/Action/'.$class.'.php';
	}elseif(substr($class, -5) == 'Model'){
		require APP_PATH.'/Model/'.$class.'.php';
	}elseif(substr($class, -4) == 'View'){
		require APP_PATH.'/View/'.$class.'.php';
	}else{
		die('ERROR Class Name!!!'.$class);
	}
}
