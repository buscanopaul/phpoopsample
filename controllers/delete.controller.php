<?php 
require_once 'core/init.php';


if(empty($_POST['id']))
{

	Redirect::to('home.php');

}

if(isset($_POST['delete']))
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
			
			
				$verify = DB::getInstance()->query("SELECT id FROM tbl_customer WHERE id = ?", array(Input::get('id')));
				
				if(!$verify->count())
				{
					Session::flash('error', 'Request has already been processed.');
				}
				else
				{
					
					try
					{
					
						DB::getInstance()->query("DELETE FROM tbl_customer WHERE id = ?", array(Input::get('id')));
						
	
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
	}
	
	
}








