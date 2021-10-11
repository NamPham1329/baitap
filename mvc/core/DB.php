<?php
define('HOST', 'localhost');
define('USERNAME', 'root');
define('PASSWORD', '');
define('DATABASE', 'webdemo');

class DB{
	protected $con;
	function __construct()
	{
		$this->con = mysqli_connect(HOST, USERNAME, PASSWORD, DATABASE);
	}
}
$db = new DB();
?>