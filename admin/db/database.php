<?php 

class database {

    private $connection = NULL;
    function getConnection() {return $this->connection;}
    function setConnection($val) {$this->connection = $val;}

    private $connection_host = '50.87.249.216';
    function getConnectionHost() {return $this->connection_host;}

    private $connection_db = 'jamieweb_peak_database';
    function getConnectionDb() {return $this->connection_db;}

    private $connection_userName = 'jamieweb_WPOQG';
    function getConnectionUsername() {return $this->connection_userName;}

    private $connection_password = 'OGsoccer17';
    private $connection_type = 'mysql';    

    // DISPLAY ERROR
    //--------------------------------------------------
    // When called, this will spit out an error div with
    // the error information passed into it.
    //--------------------------------------------------
    
    function DisplayError($err) {
		echo "<div class=\"errorMessage\">ERROR: " . $err . "</div>" . PHP_EOL;
	}
	
    function connect() {
        $this->setConnection(new PDO($this->connection_type . ':host=' . $this->connection_host . ';dbname=' . $this->connection_db, $this->connection_userName, $this->connection_password));
    }

    function disconnect() {
        $connection = NULL;
    }
}
?>