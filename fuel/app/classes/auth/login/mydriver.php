<?php

class Auth_Login_Mydriver extends \Auth\Auth_Login_Simpleauth
{

    /**
	 * Check for login
	 *
	 * @return  bool
	 */
	protected function perform_check()
	{
		// fetch the username and login hash from the session
		$username    = Session::get('username');

		// only worth checking if there's both a username and login-hash
		if ( ! empty($username) )
		{
			

			if (is_null($this->user) or ($this->user['name'] != $username))
			{
				$this->user = \DB::select_array(\Config::get('simpleauth.table_columns', array('*')))
					->where('name', '=', $username)
					->from(\Config::get('simpleauth.table_name'))
					->execute(\Config::get('simpleauth.db_connection'))->current();

			}

			// return true when login was verified, and either the hash matches or multiple logins are allowed
			if ($this->user and (Config::get('simpleauth.multiple_logins', false)))
			{
				return true;
			}
		}

		// not logged in, do we have remember-me active and a stored user_id?
		elseif (static::$remember_me and $user_id = static::$remember_me->get('id_user', null))
		{
			return $this->force_login($user_id);
		}

		// no valid login when still here, ensure empty session and optionally set guest_login
		$this->user = \Config::get('simpleauth.guest_login', true) ? static::$guest_login : false;
		Session::delete('username');

		return false;
	}

	/**
	 * Check the user exists
	 *
	 * @return  bool
	 */
	public function validate_user($login_id = '', $password = '')
	{
		$login_id = trim($login_id) ?: trim(\Input::post(\Config::get('simpleauth.username_post_key', 'login_id')));
		$password = trim($password) ?: trim(\Input::post(\Config::get('simpleauth.password_post_key', 'password')));

		if (empty($login_id) or empty($password))
		{
			return false;
		}

		$user = DB::select_array(Config::get('simpleauth.table_columns', array('*')))
			->where_open()
			->where('login_id', '=', $login_id)
			->where_close()
			->where('password', '=', $password)
			->from(\Config::get('simpleauth.table_name'))
			->execute(\Config::get('simpleauth.db_connection'))->current();

		return $user ?: false;
	}

	/**
	 * Login user
	 *
	 * @param   string
	 * @param   string
	 * @return  bool
	 */
	public function login($login_id = '', $password = '')
	{
		if ( ! ($this->user = $this->validate_user($login_id, $password)))
		{
			$this->user = Config::get('simpleauth.guest_login', true) ? static::$guest_login : false;
			Session::delete('username');
			return false;
		}

		// register so Auth::logout() can find us
		Auth::_register_verified($this);

		Session::set('username', $this->user['name']);
		Session::instance()->rotate();
		return true;
	}

	/**
	 * Logout user
	 *
	 * @return  bool
	 */
	public function logout()
	{
		$this->user = \Config::get('simpleauth.guest_login', true) ? static::$guest_login : false;
		Session::delete('username');
		return true;
	}

	/**
	 * Getter for user data
	 *
	 * @param  string  name of the user field to return
	 * @param  mixed  value to return if the field requested does not exist
	 *
	 * @return  mixed
	 */
	public function get($field, $default = null)
	{
		if (isset($this->user[$field]))
		{
			return $this->user[$field];
		}
		elseif (isset($this->user['profile_fields']))
		{
			return $this->get_profile_fields($field, $default);
		}

		return $default;
	}


}