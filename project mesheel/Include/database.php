<?php 


class database {

    private $host;
    private $user;
    private $password;
    private $database;
    public $conn;


	function __construct() {
        
		require_once 'connect.php';
        /*
		$this->host = $host;
        $this->user = $dbUser;
        $this->password = $dbPass;
        $this->database = $dbName;
        */
		include_once 'DatabaseConnectionSingleton.php';
		$this->conn = Singleton::getinstance();
        //$this->connect();
    }
	
	
	
	function connect() {
        if (!$this->conn = new mysqli($this->host, $this->user, $this->password, $this->database)) {
            throw new Exception("Error:not connected to the server or not found database.");
        }
    }

    function close() {
        $this->conn->close();
    }

}











?>