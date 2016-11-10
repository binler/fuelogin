<?php

class Controller_Admin extends Controller_Template
{
	public $template = 'template.tpl';

	public function before()
	{
		parent::before();

		if (Request::active()->controller !== 'Controller_Admin' or ! in_array(Request::active()->action, array('login', 'logout', 'maintenance')))
		{
			if( ! Auth::check() )
			{
				Response::redirect('admin/login');
			}
		    
		}
	}

	public function action_maintenance()
	{
		$data['maintenance'] = '0';
		$this->template->title = 'Maintenance page';
		$this->template->content = View_Smarty::forge('admin/maintenance.tpl', $data);
	}

	public function action_index()
	{

		$this->template->title = 'Hello';
		$this->template->content = View_Smarty::forge('admin/index.tpl');
	}

	public function action_login()
	{
		$result = Model_User::getInfo();
		$data['maintenance'] = $result['maintenance']; 
		$data['info'] = $result['info'];

		if(Input::referrer() == 'http://fuelogin.dev/admin/maintenance')
		{
			$data['maintenance'] = '0';
		}


		Auth::check() and Response::redirect('admin');

		if(Input::method() == 'POST')
		{

			if (Auth::check() or Auth::login(Input::post('login_id'), Input::post('password')) )
			{

			    Response::redirect('admin');
			}
		}

		$this->template->title = 'Login';
		$this->template->content = View_Smarty::forge('admin/login.tpl', $data);
	}

	public function action_logout()
	{
		
		Auth::logout();
		Response::redirect('admin/login');
	}

}
