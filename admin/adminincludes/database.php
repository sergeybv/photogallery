<?php

  require_once "new_config.php";

class Database{

    public $connection;

    public function __construct(){


    	$this->open_db_connetion();
    }

    public function open_db_connetion(){

     $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


        if($this->connection->connect_error){

        	die("Ooops, somethig has happend with connection" . mysql_error());
        }
    }

    public function query($sql){

   
      $result = mysqli_query($this->connection, $sql);
    
      return $result;

    }

    public function confirm_query($result){
     
        if(!$result){

      	die("Query failed!");
      }
 
    }

    public function escape_string($string){

       $escape_string = mysqli_real_escape_string($this->connection, $string);
       return $escape_string;

    }


    public function the_insert_id(){


       return mysqli_insert_id($this->connection);

    }


  }


$database = new Database();



