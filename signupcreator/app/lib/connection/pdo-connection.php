<?php 

class PDO_connection
{
	private $query;
	private $param;
	private $connection;
	private $stmt;
	private $result;
	public function __construct($db_host,$db_user,$db_pass,$db_name)
	{
		try{

		$this->connection = new PDO("mysql:host=$db_host;dbname=$db_name", $db_user, $db_pass);
		$this->connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		
		}
		
		catch(PDOException $ex)
	    {
	    	echo "PDO Connection failed: " . $ex-> getMessage();
	    }
	}

	public function query($query)
	{
		if ($query === '')
			throw new Exception("Error: please include a command!");

		$this->query = $query;
		$this->param = [];
	}

	public function params($column,$param)
	{
		$this->param[$column] = $param;
	}

	public function execute()
	{
		if($this->query === '')
			return false;

		$stmt = $this->connection->prepare($this->query);
			foreach ($this->param as $col=> $val) {
				$stmt->bindParam(':'.$col,$this->param[$col]);
			}
		$this->stmt = $stmt;
		$this->result = $stmt->execute();
	}

	private function filter_result($query,$filter)
	{
		$query = strtoupper($query);
		$filter = strtoupper($filter);
		return strpos($query, $filter,0) !== false;
	}

	public function result()
	{
		if($this->query == '')
			return false;

		if($this->filter_result($this->query,'insert'))
			$result = $this->connection->lastInsertId();
		elseif($this->filter_result($this->query,'update'))
			$result = $this->stmt->rowCount();
		elseif($this->filter_result($this->query,'select'))
		{
			$this->stmt->setFetchMode(PDO::FETCH_ASSOC);
			$result = $this->stmt->fetchAll();
		}else
        {
            $this->stmt->setFetchMode(PDO::FETCH_ASSOC);
            $result = $this->stmt->fetchAll();
        }

		return $result;

	}
}