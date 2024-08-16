<?php 

namespace Config;

use mysqli;

class db {
    private $host = "localhost";
    private $db_name = "xspeed_exam";
    private $username = "root";
    private $password = "";

    public $conn;

    public function __construct() {
        $this->getConnection();
    }

    public function getConnection() {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->db_name);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
    }

}
    