<?php /* Smarty version 3.1.24, created on 2015-07-02 15:09:21
         compiled from "C:/WWW/individual/Application/Tpl/Index/test.html" */ ?>
<?php
/*%%SmartyHeaderCode:31985594e3a1ef1402_85222852%%*/
if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    'd14c90f4936050ec9e8180820258f8283ad87226' => 
    array (
      0 => 'C:/WWW/individual/Application/Tpl/Index/test.html',
      1 => 1435809030,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '31985594e3a1ef1402_85222852',
  'variables' => 
  array (
    'data' => 0,
    'value' => 0,
    'xxx' => 0,
    'zzz' => 0,
  ),
  'has_nocache_code' => false,
  'version' => '3.1.24',
  'unifunc' => 'content_5594e3a2037447_41533863',
),false);
/*/%%SmartyHeaderCode%%*/
if ($_valid && !is_callable('content_5594e3a2037447_41533863')) {
function content_5594e3a2037447_41533863 ($_smarty_tpl) {

$_smarty_tpl->properties['nocache_hash'] = '31985594e3a1ef1402_85222852';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www./TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="content-Type" content="text/html; charset=UTF-8" />
	<title>首页</title>
</head>
<body>
	<?php
$_from = $_smarty_tpl->tpl_vars['data']->value;
if (!is_array($_from) && !is_object($_from)) {
settype($_from, 'array');
}
$_smarty_tpl->tpl_vars['value'] = new Smarty_Variable;
$_smarty_tpl->tpl_vars['value']->_loop = false;
$_smarty_tpl->tpl_vars['key'] = new Smarty_Variable;
foreach ($_from as $_smarty_tpl->tpl_vars['key']->value => $_smarty_tpl->tpl_vars['value']->value) {
$_smarty_tpl->tpl_vars['value']->_loop = true;
$foreach_value_Sav = $_smarty_tpl->tpl_vars['value'];
?>
		<?php echo $_smarty_tpl->tpl_vars['value']->value['name'];
echo $_smarty_tpl->tpl_vars['xxx']->value;?>
总归要随便说的别的啥的吧<?php echo $_smarty_tpl->tpl_vars['zzz']->value;?>
这个括号里面必须有$不信你看}
	<?php
$_smarty_tpl->tpl_vars['value'] = $foreach_value_Sav;
}
?>
</body>
</html><?php }
}
?>