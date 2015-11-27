<?php 
return [
	'connections' => array(
		'mysql-wordpress' => array(
		    'driver'    => 'mysql',
		    'host'      => 'localhost',
		    'database'  => getenv('wp_database'),
		    'username'  => getenv('wp_username'),
		    'password'  => getenv('wp_password'),
		    'unix_socket'   => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock',
		    'charset'   => 'utf8',
		    'collation' => 'utf8_unicode_ci',
		    'prefix'    => 'wp_',
		),
		'mysql' => array(
			'driver'    => 'mysql',
			'host'      => "localhost",
			'unix_socket'   => '/Applications/XAMPP/xamppfiles/var/mysql/mysql.sock',
			'database'  => "demo_test",
			'username'  => "root",
			'password'  => "",
			'charset'   => 'utf8',
			'collation' => 'utf8_unicode_ci',
			'prefix'    => ''
		)
	)
];

