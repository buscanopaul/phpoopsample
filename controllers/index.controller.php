<?php
require_once 'core/init.php';

$user = new User();
if($user->isLoggedIn())
{
	Redirect::to('home.php');
}

if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{		
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'username' => array(
				'name' => 'Username',
				'required' => true
			),
			'password' => array(
				'name' => 'Password',
				'required' => true
			)
		));
		
		if($validation->passed())
		{
			$user = new User();
			$login = $user->login(Input::get('username'), Input::get('password'));
			
			if($login)
			{
				//$msg = Session::get(Config::get('session/session_name'));
				Redirect::to('home.php');
			}
			else 
			{
				Session::flash('error', "Please check your Username and Password.");
			}
		}
		else 
		{
			Session::flash('error', array_values($validation->errors())[0] . ".");
		}
	}
	
}