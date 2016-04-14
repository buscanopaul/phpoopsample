<?php
class Add
{
	private $_db;
	
	public function __construct($user = null)
	{
		$this->_db = DB::getInstance();
	}
	
	public function create($table, $fields = array())
	{
		if(!$this->_db->insert($table, $fields))
		{
			throw new Exception("There was a problem in checking in the document.");
		}
	}
}
