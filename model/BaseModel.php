<?php

class BaseModel
{
	private $dbh;

	public function __construct()
	{
		try
		{
			$this->dbh = new PDO( Config::getDBUser(), Config::getDBPass(), Config::getDBHost() );
		}
		catch (Exception $e)
		{
			echo 'Error: Database connect error.';
		}
	}
}

?>