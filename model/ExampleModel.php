<?php
require_once('BaseModel.php');

class ExampleModel extends BaseModel
{
	private $example_value;

	public function __construct()
	{

	}

	public function validateExample($value)
	{
		if ( is_string($value) && strlen($value) <= 255 )
		{
			return true;
		}

		return false;
	}

	public function setExampleValue($value)
	{
		if ( $this->validateExample($value) )
		{
			$this->example_value = strip_tags($value);

			return true;
		}
		
		return false;
	}

	public function getExampleValue()
	{
		return strip_tags($this->example_value);
	}

	public function saveExampleValue()
	{
		$sql = "INSERT INTO values_table (value) VALUES (:value)";
		$sth = $this->dbh->prepare($sql);
		$result = $sth->execute(array( ':value' => $this->getExampleValue() ));

		if ( $result )
		{
			return $this->dbh->lastInsertId();
		}

		return false;
	}
}

?>