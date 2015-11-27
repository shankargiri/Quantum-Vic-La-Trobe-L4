<?php
/**
 * Configuration for WordPress Auth
 */

return array(

	/*
	|--------------------------------------------------------------------------
	| Database Connection for WordPress
	|--------------------------------------------------------------------------
	|
	| Either specify one of the default database connections from
	| app/config/database.php - or create a new one and specify that here
	|
	| Important: make sure that the prefix for the connection matches that of
	| your WordPress installation. If you have other non-WordPress tables in
	| the same database you already have a connection for but with a different
	| (or no) prefix, create a new connection using the same settings, but using
	| the prefix from WordPress
	|
	*/

	'connection' => 'mysql-wordpress',

	/*
	|--------------------------------------------------------------------------
	| WordPress Table Name
	|--------------------------------------------------------------------------
	|
	| The table name in WordPress which holds the user credentials
	| Don't include the table prefix - that will be added by the connection
	| settings
	|
	*/

	'table' => 'users',

	/*
	|--------------------------------------------------------------------------
	| WordPress ID Field
	|--------------------------------------------------------------------------
	|
	| The column name in WordPress which holds the user id
	|
	*/

	'id' => 'ID',


	/*
	|--------------------------------------------------------------------------
	| WordPress Username Field
	|--------------------------------------------------------------------------
	|
	| The column name in WordPress which holds the username
	|
	*/

	'username' => 'user_login',

	/*
	|--------------------------------------------------------------------------
	| WordPress Password Field
	|--------------------------------------------------------------------------
	|
	| The column name in WordPress which holds the password
	|
	*/

	'password' => 'user_pass',

	/*
	|--------------------------------------------------------------------------
	| WordPress Email Field
	|--------------------------------------------------------------------------
	|
	| The column name in WordPress which holds the user email
	|
	*/

	'email' => 'user_email',

);

?>
