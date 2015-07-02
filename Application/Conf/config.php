<?php
return array(
	'db_config' => array(
		'db_host' => 'localhost',
		'db_user' => 'root',
		'db_pass' => '123',
		'db_name' => 'individual',
		'db_char' => 'UTF8',
		),
	'view_config' => array(
		'Smarty' => array(
			'left_delimiter' => '{',
			'right_delimiter' => '}',
			'config_dir' => 'Smarty/Config_File.class.php',
			'caching'	=> false,
			'template_dir' => './templates',
			'compile_dir' => './templates_c',
			'cache_dir' => './smarty_cache',
			)
		),
);