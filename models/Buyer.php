<?php 

namespace Models;
require_once '../config/db.php';
use  Config\db;

class Buyer extends db {

    // FOR DELETE, UPDATE, SINGLE DATA, AND ALSO CREATE 
    public function commonQuery($query) {
        $result = mysqli_query($this->conn, $query);
        if($result) {
            return $result;
        }
    }

    // fetch all data
    public function getData($query) {
        $result = mysqli_query($this->conn, $query);
        if( mysqli_num_rows($result) > 0) {
            return $result;
        }
    }
}