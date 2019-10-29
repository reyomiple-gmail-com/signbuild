<?php 

class Filter_Data
{
	public static function filter($array_data)
	{
		self::validate_data($array_data);
		$data_array = [];
		foreach ($array_data as $key => $value) {

			$data_array[$key] = filter_var($value,FILTER_SANITIZE_STRING);
		}
		return $data_array;
	}

	public static function new_array($array)
	{
		$newArr = [];
		foreach ($array as $key) {
			foreach ($key as $key2 => $value) {
				$newArr[$key2] = $value;
			}
		}
		return $newArr;
	}

	public static function check_quote($array)
    {
    	$new = array();
    	foreach ($array as $key => $value) {
    		 $value = str_replace("'", "''", $value);
    		$new[$key] = $value;
    	}

        return $new;
    }

	public static function validate_data($data_validate)
	{
		if(empty($data_validate))
			throw new Exception("Please insert data to validate");
		return false;
			
	}
}