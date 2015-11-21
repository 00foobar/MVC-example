<?php
require_once('BaseController.php');

class ExampleController extends BaseController
{
	public function __construct()
	{
		parent::__construct();
	}

	function saveExampleValueAction()
	{
		$example_value = $this->request->get('example_value');

		$example_model = $this->loadModel('Example');
		$template = $this->loadTemplate('Example');
		
		if ( $this->example_model->validate($example_value) )
		{
			$this->example_model->setExampleValue($example_value);
			$example_value_id = $this->example_model->saveExampleValue();

			$template->example_value_id = $example_value_id;
			$template->example_value = $this->example_model->getExampleValue();
			$template->show();
		}
		else
		{
			$template->example_value = 'ERROR!';
			$template->show();
		}
	}

	function showExampleValueAction()
	{
		$request = $this->loadRequest();
		$example_model = $this->loadModel('Example');
		$template = $this->loadTemplate('Example');
		
		$example_value = $request->get('example_value');

		$template->example_value = strip_tags(print_r($example_value,1));
		$template->show();
	}
}