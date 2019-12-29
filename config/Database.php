<?php

/**
 * Create a class database
 * create database parameters
 * create a function connect()
 * create a new PDO object to connect to dabase
 */

class Database 
{
    private $host = 'localhost';
    private $db_name = 'myblog';
    private $username = 'root';
    private $password = '';
    public $conn;

    //connect
    public function connect(){
        $this->conn = null;

        try {
            $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }

        return $this->conn;
    }
}










































//     class Database
//     {
//         //db params
//         private $host = "localhost";
//         private $db_name = "myblog";
//         private $username = "root";
//         private $password = "";
//         private $conn;

//         // db connect
//         public function connect()
//         {
//             $this->conn = null;

//             try {
//                 $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name, $this->username, $this->password);
//                 $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//                 echo "Connected ";
//             } catch(PDOException $e) {
//                 echo "Connection error" . $e->getMessage();
//             }

//             return $this->conn;

//         }
//     };


// $db = new Database();
// echo $db->connect();
