<?php

class Template
{
	// name of the template file
	private $template_file;
	// values to fit in template file (assoc array)
	private $values = array();

	public function __construct($template_name)
	{
		$this->setTemplateName($template_name);
	}

	public function setTemplateName($template_name)
	{
		if ( !file_exists('view' . DIRECTORY_SEPARATOR . $template_name . '.html') )
		{
			throw new Exception("Error: Template path dont exists.", 1);
		}

		$this->template_file = $template_name . '.html';	
	}

	// magical setter
	public function __set($key,$val)
	{
		$this->values[$key] = $val;
	}

	public function compile($eval = false)
	{
		$template = file_get_contents('view' . DIRECTORY_SEPARATOR . $this->template_file);

		foreach ($this->values as $key => $value)
		{
			$template = str_replace('{{ ' . $key . ' }}', $value, $template);
		}
		
		if ( $eval == true )
		{
			// start output puffer
			ob_start();

			$content = eval(' ?>' . $template . '<?php ');

			$content = ob_get_contents();
			ob_end_clean();
		}
		else
		{
			$content = $template;
		}

		return $content;
	}

	public function show($eval = false)
	{
		echo $this->compile($eval);
	}
}

?>