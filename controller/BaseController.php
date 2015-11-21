<?php

class BaseController
{
	public function __construct()
	{

	}

	public function loadModel($model_name)
	{
		// @TODO LFI
		$model_path = 'model' . DIRECTORY_SEPARATOR . $model_name . 'Model' . '.php';

		if ( file_exists($model_path) )
		{
			require_once($model_path);
			$model_name = $model_name . 'Model';
			return new $model_name;
		}
		else
		{
			throw new Exception("Error Processing Request", 1);
		}
	}

	public function loadTemplate($template_name)
	{
		return new Template($template_name);
	}

	public function loadRequest()
	{
		return new Request();
	}
}

?>