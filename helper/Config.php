<?php

class Config
{
	private $db_user = 'root';
	private $db_pass = 'password';
	private $db_host = '';

	public static function getDBUser()
	{
		return $db_user;
	}

	public static function getDBPass()
	{
		return $db_pass;
	}

	public static function getDBHost()
	{
		return $db_host;
	}
}

?>