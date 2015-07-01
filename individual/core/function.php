<?php
function C($action,$method){
	$actionClassName = ucwords($action).'Action';
	$actionClass = new $actionClassName($action);
	$actionClass->_view = V($action,$method);
	$actionClass->$method();
}
function M($model){
	$modelClassName = ucwords($model).'Model';
	$modelClass = new $modelClassName();
	return $modelClass;
}
function V($action,$method){
	$viewClass = new View($action,$method);
	return $viewClass;
}