<?php

class Request
{
	private $request = array();

	public function __construct()
	{
		$this->request['POST'] = $_POST;
		$this->request['GET'] = $_GET;
		$this->request['COOKIE'] = $_COOKIE;
	}

	public function get($key)
	{
		if ( array_key_exists($key, $this->request['GET']) )
		{
			return $this->request['GET'][$key];
		}

		return null;
	}

	public function post($key)
	{
		if ( array_key_exists($key, $this->request['POST']) )
		{
			return $this->request['POST'][$key];
		}

		return null;
	}

	public function getCookies()
	{
		if ( isset($this->request['COOKIE']) )
		{
			return $this->request['COOKIE'];
		}

		return null;
	}


}

?>