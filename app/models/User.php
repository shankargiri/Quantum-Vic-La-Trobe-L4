<?php 

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Hampel\WordPress\Auth\WordPressAuthServiceProvider;
use Hampel\WordPress\Auth\WordPressUser;

class User extends Eloquent implements UserInterface, RemindableInterface {
	use UserTrait, RemindableTrait;

	/**
	 * The database table used by the model.
	 *
	 * @var string 
	 */
	public $timestamps = false;
	protected $connection = "mysql-wordpress";
	 protected $fillable = ['user_login', 'password']; 

	protected $table = 'wp_users';

	protected $primaryKey = 'userid';

	public static $rules=['username'=>'required' , 'password' => 'required'];

	public static $messages;

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('user_pass');

	public function __construct(array $attributes = array())
	{
		parent::__construct($attributes);

		$this->primaryKey = Config::get('wordpress-auth-laravel::auth.id');
		$this->table = Config::get('wordpress-auth-laravel::auth.table');
		$this->hidden = array(Config::get('wordpress-auth-laravel::auth.password'));
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */

	public function photos()
	{
		return $this->hasMany('Photo');
	}

	public function quiz_attempts()
	{
		return $this->hasMany("QuizAttempt");
	}

	/**
	 * Get the username for the user.
	 *
	 * @return string
	 */
	public function getUsername()
	{
		$username = Config::get('wordpress-auth-laravel::auth.username');

		return $this->{$username};
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		$password = Config::get('wordpress-auth-laravel::auth.password');

		return $this->{$password};
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		$email = Config::get('wordpress-auth-laravel::auth.email');

		return $this->{$email};
	}
	
	public static function isValid()
	{
		$validation = Validator::make(Input::all(),static::$rules);
		if($validation -> passes())
		{
			return true;
		}
		static::$messages = $validation -> messages();
		return false;
	}


	public function getRememberToken()
	{
		return $this->remember_token;
	}

	public function setRememberToken($value)
	{
		$this->remember_token = $value;
	}

	public function getRememberTokenName()
	{
		return 'remember_token';
	}


	 public function profiles()
    {
        return $this->hasMany('Profile');
    }

}
