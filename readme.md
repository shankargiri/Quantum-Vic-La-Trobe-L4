#Laravel Updated to 4.2.* from 4.1.*
Added a Repo "Quantum" in app/"-Any helper classes can go in here

Follow the link for upgrade path: 

http://laravel.com/docs/upgrade
followed by 

--composer update
--composer dump-autoload


## Industry project Installation instructions
1. clone the repository
2. Create a new branch and switch to that branch( git branch yourname followed by git checkout yourname)
3. Add your hostname(type hostname in terminal) to bootstrap/start.php on line number 27 after 'bashanta-17595477.local'
4. Create a folder named 'development' in app/config directory and create file named database.php
5. Add following content in database.php and modify database, username and password


		<?php 
	
		return [

			'connections' => array(
				'mysql-wordpress' => array(
		    		'driver'    => 'mysql',
		    		'host'      => 'localhost',
		    		'database'  => getenv('wp_database'),
		    		'username'  => getenv('wp_username'),
		    		'password'  => getenv('wp_password'),
		    		'charset'   => 'utf8',
		    		'collation' => 'utf8_unicode_ci',
		    		'prefix'    => 'wp_',
				),
				'mysql' => array(
					'driver'    => 'mysql',
					'host'      => "localhost",
					'database'  => "your-database-name",
					'username'  => "your-mysql-username",
					'password'  => "your-mysql-password",
					'charset'   => 'utf8',
					'collation' => 'utf8_unicode_ci',
					'prefix'    => ''
				)
			)];
6. clone wordpress site for wordpress authentication(https://github.com/n2sandhu/wordpress_auth) and paste put sql from SQL/	wordpress.sql to wordpress database.
7. add environment variables in .env.development.php as follows and edit values
			

		<?php

		return array(

    		'max_per_page'  => pagination max per page,
    		'max_file_size' => max file size you want to upload in server,
    		'wp_database'	=> 'database for wordpress',
    		'wp_username'  => 'wordpress db username',
		'wp_password'  => 'wordpress password'
		);
8. run composer(composer.phar) update
9. copy getRememberToken(), getRememberTokenName(), setRememberToken() functions from user model to vendor/hampel/wordpress-	auth-laravel/src/Hampel/WordPress/Auth/WordPressUser.php (this is patch)
10. run php artisan migrate:install
11. run php artisan migrate
12. run php artisan serve

