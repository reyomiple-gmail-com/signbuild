<?php 

class Response
{

	public static function json_output($data)
	{
		if(empty($data))
        {
            throw new Exception("Empty data detected.");
            return false;
        }


		header('content-type: application/json');
		return json_encode($data);
	}

	public static function output($data)
	{
		if(empty($data))
        {
            throw new Exception("Empty data detected.");
            return false;
        }

		exit($data);
	}
}