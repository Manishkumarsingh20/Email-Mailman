<?php

 class dbconnection{
    protected $db_name = 'mydata';
	protected $db_user = 'root';
	protected $db_pass = 'hestabit';
	protected $db_host = 'localhost';
	public $connect_db;
	public function __construct()
	{
		$this->connect_db = new mysqli($this->db_host, $this->db_user, $this->db_pass, $this->db_name);
		if (!$this->connect_db) {
			echo "not connected";
		} 
		else {

			echo "connected";
		}
	}
}

$db=new dbconnection();

?>
