<?php
class DB
{

	protected $db_name = 'manish';
	protected $db_user = 'tse';
	protected $db_pass = 'bPmtHasjyTJ2SgZJ';
	protected $db_host = 'localhost';
	public $connect_db;
	public function __construct()
	{
		$this->connect_db = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		if ($this->connect_db) {
			// echo "DB connected";
		} 
		else {
			echo "DB not connected";

		}
	}

	public function insertinto($query)
	{
		$result= $this->connect_db->query($query);
		if ($result) {
			return true;
		} else {
			return false;
		}
	}
	public function url($url)
	{
		header("location:" . $url);
	}
}


?>
