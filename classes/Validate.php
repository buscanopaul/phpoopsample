<?php 
class Validate
{
	private $_passed = false,
			$_errors = array(),
			$_db = null;
	
	public function __construct()
	{
		$this->_db = DB::getInstance();
	}
	
	public function check($source, $items = array())
	{
		foreach($items as $item => $rules)
		{
			foreach($rules as $rule => $rule_value)
			{
				$value = trim($source[$item]);
				$item = escape($item);
				$field = $rules['name'];
				
				if($rule === 'required' && empty($value))
				{
					$this->addError("{$field} is required");
				}	
				else if(!empty($value))
				{
					switch($rule)
					{
						case "min":
							if(strlen($value) < $rule_value)
							{
								$this->addError("{$field} must be a minimum of {$rule_value}");
							}
							break;
						case "max":
							if(strlen($value) > $rule_value)
							{
								$this->addError("{$field} must be a maximum of {$rule_value}");
							}
							break;
						case "matches":
							if($value != $source[$rule_value])
							{
								$this->addError("{$field} must match {$rule_value}");
							}
							break;
						case "unique":
							$check = $this->_db->get($rule_value, array($item, '=', $value));
							if($check->count())
							{
								$this->addError("{$field} already exists");
							}
							break;
					}
				}
			}
		}
		
		if(empty($this->_errors))
		{
			$this->_passed = true;
		}
		
		return $this;
	}
	
	private function addError($error)
	{
		$this->_errors[] = $error;
	}
	
	public function errors()
	{
		return $this->_errors;
	}
	
	public function passed()
	{
		return $this->_passed;
	}
}