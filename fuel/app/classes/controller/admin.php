<?php

class Controller_Admin extends Controller_Template
{
	public $template = 'template.tpl';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout')))
		{
			if( ! Auth::check() )
			{
				Response::redirect('admin/login');
			}
		    
		}
	}

	public function action_index()
	{

		$this->template->title = 'Hello';
		$this->template->content = View_Smarty::forge('admin/index.tpl');
	}

	public function action_login()
	{
		Auth::check() and Response::redirect('admin');

		if(Input::method() == 'POST')
		{

			if (Auth::check() or Auth::login(Input::post('login_id'), Input::post('password')) )
			{

			    Response::redirect('admin');
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View_Smarty::forge('admin/login.tpl');
	}

	public function action_logout()
	{
		
		Auth::logout();
		Response::redirect('admin/login');
	}

}
