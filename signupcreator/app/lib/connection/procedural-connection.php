<?php 

	class Procedural_connection
	{
		public function __construct($db_host,$db_user,$db_pass,$db_name)
		{
			$this->con = mysqli_connect($db_host,$db_user,$db_pass,$db_name);
			if(!$this->con)
			{
				exit('Unable to connect to server');
			}
		}

		function _advance_key_array($array)
		{
			$final_array = array();
			for($x=0;$x<count($array);$x++)
			{
				$tmp_array = array();
				foreach($array[$x] as $key=> $val)
				{
					if(!is_integer($key))
					{$tmp_array[$key] = $val;}
				}
				array_push($final_array,$tmp_array);
			}
			return $final_array;
		}

		public function _get($query_string)
		{
			$data_array = array();

			$query = mysqli_query($this->con,$query_string);

			if(mysqli_num_rows($query) >= 1)
			{
				while ($row = mysqli_fetch_array($query)) {
					array_push($data_array, $row);
				}
				return $data_array;
			}

		}

		public function close_connection()
		{
			mysql_close($this->con);
		}

		public function _set($query,$type)
		{
			if($type == true)
			{
				mysqli_query($this->con,$query);
				return array("id"=>mysqli_insert_id($this->con),"row affected"=>mysqli_affected_rows($this->con));
			}
		}
	}