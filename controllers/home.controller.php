<?php 
require_once 'core/init.php';

$user = new User();
if(!$user->isLoggedIn())
{
	Redirect::to('index.php');
}

$customers = DB::getInstance()->query("SELECT * FROM tbl_customer ORDER BY 1 DESC");



if(!$customers->count())
{
	Session::flash('record', 'No current customer/s.');
}

