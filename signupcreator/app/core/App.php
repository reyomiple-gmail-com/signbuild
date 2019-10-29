<?php 

class App
{
	const LIBRARY =  'app/lib/';
	protected $controller = 'login';
	protected $method = 'index';
	protected $params = [];
	

	public function __construct()
	{
		$url = $this->parseUrl();

		if(empty($url))
		{
			$url[0] = $this->controller;
		}

		if(file_exists('app/controllers/'.$url[0].'.php'))
		{
			$this->controller = $url[0];
			unset($url[0]);
		}else
		{
			require_once 'app/controllers/error.php';
			$this->controller = new Errors;
			http_response_code(404);
			return false;
		}

		require_once 'app/controllers/'.$this->controller.'.php';

		$this->controller = new $this->controller;

		if(isset($url[1]))
		{
			if(method_exists($this->controller, $url[1]))
			{
				$this->method = $url[1];
				unset($url[1]);
			}
		}

		$this->params = $url ? array_values($url) : [];

		call_user_func_array([$this->controller,$this->method], $this->params);
	}

	public function parseUrl()
	{
		if(isset($_GET['url']))
		{
			return $url = explode('/',filter_var(rtrim($_GET['url'],'/'),FILTER_SANITIZE_URL));
		}
	}

	public static function load_library($library){require_once self::LIBRARY.$library.'.php';}
}