<?php

// Enable display_errors and error reporting.
ini_set('display_errors', 1);
error_reporting(E_ALL);

#[AllowDynamicProperties]
class DB
{
	public function __construct()
	{
		$this->db = new PDO('sqlite:db.sqlite');
	}

	public function query($query)
	{
		$result = $this->db->query($query);
		if ($result === false)
		{
			if ($this->db->errorCode() === null)
			{
				return array();
			}
			else
			{
				echo 'An error was encountered!';
				var_dump($query);
				var_dump($this->db->errorCode());
				var_dump($this->db->errorInfo());
				exit;
			}
		}


		return $result->fetchAll(PDO::FETCH_ASSOC);
    }
    public function prepare($q) {
        return $this->db->prepare($q);
    }
}

$db = new DB();
?>
