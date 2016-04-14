<?php
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}


if(Input::exists())
{
	if(Token::check(Input::get('token')))
	{
		$validate = new Validate();
		$validation = $validate->check($_POST, array(
			'firstname' => array(
				'name' => 'firstname',
				'required' => true,
				'min' => 2,
				'max' => 20,
				
			),

				'lastname' => array(
					'name' => 'lastname',
					'required' => true,
					'min' => 2,
					'max' => 32
				),

				
				'age' => array(
					'name' => 'age',
					'required' => true,
					'min' => 2,
					'max' => 32
				)

		
		));
		
		if($validation->passed())
		{
			$add = New Add();

			
			try 
			{
				$add->create('tbl_customer', array(
							'firstname' => Input::get('firstname'),
							'lastname' => Input::get('lastname'),
							'age' => Input::get('age')
						
				));
				
				unset($_POST);
				Redirect::to('home.php');
				
			}
			catch(Exception $e)
			{
				die($e->getMessage());
			}
		}
		else 
		{
			Session::flash('error', array_values($validation->errors())[0] . ".");
		}
	}
}