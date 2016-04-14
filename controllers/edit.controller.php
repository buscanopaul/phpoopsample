<?php 
require_once 'core/init.php';


if(empty($_POST['id']))
{

	Redirect::to('home.php');

}

if(isset($_POST['edit']))
{

	$id = $_POST['id'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$age = $_POST['age'];


}

$user = new User();
if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}

if(Input::exists())
{
	if(isset($_POST['process']))
	{

		if(Token::check(Input::get('token')))
		{
			$validate = new Validate();
			$validation = $validate->check($_POST, array(
				'firstname' => array(
					'name' => 'firstname',
					'required' => true
				),
				'lastname' => array(
					'name' => 'lastname',
					'required' => true
				),
				'age' => array(
					'name' => 'age',
					'required' => true
				)
			));
			if($validation->passed())
			{
				$verify = DB::getInstance()->query("SELECT id FROM tbl_customer WHERE id = ?", array(Input::get('id')));
				
				if(!$verify->count())
				{
					Session::flash('error', 'Request has already been processed.');
				}
				else
				{
					
					try
					{
						DB::getInstance()->update('tbl_customer', Input::get('id'), array(
							'firstname' => Input::get('firstname'),
							'lastname' => Input::get('lastname'),
							'age' => Input::get('age')
						));

						
	
						unset($_POST);
						Session::flash('success', 'Request has been processed.');
						Redirect::to('home.php');
					}
					catch(Exception $e)
					{
						die($e->getMessage());
					}
				}
			}
			else 
			{
				Session::flash('error', array_values($validation->errors())[0] . ".");
			}
		}
	}
	
	
}








