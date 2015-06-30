<?php

define('ROOT_PATH',str_replace('\\','/',dirname(__FILE__)));
define('APP_PATH',ROOT_PATH.'/Application');
require ROOT_PATH.'/individual/core/function.php';
spl_autoload_register('auto_load');
$action = isset($_REQUEST['action']) ? (get_magic_quotes_gpc() ? $_REQUEST['action'] : addslashes($_REQUEST['action'])) : 'index';
$method = isset($_REQUEST['method']) ? (get_magic_quotes_gpc() ? $_REQUEST['method'] : addslashes($_REQUEST['method'])) : 'index';
C($action,$method);