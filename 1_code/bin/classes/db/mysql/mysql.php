<?php

class mysqlDBClass {
    // Private Vars
    private $_connection;
    private $_username;
    private $_password;
    private $_host;

    function __construct($hostname,$database,$username,$password) {

        $this->_host = $hostname;
        $this->_database = $database;
        $this->_username = $username;
        $this->_password = $password;
      
    }

    function dbConnect(){
        try {
            $this->_connection = new PDO("mysql:host=".$this->_host.";dbname=".$this->_database."", $this->_username, $this->_password);
            $this->_connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            return true;

          } catch(PDOException $e) {

            //echo "Connection failed: " . $e->getMessage();
            return false;

          }
    }


    function query($query,$data){

        if(is_string($query)){

            $msqlStmt = $this->_connection->prepare($query);
            
            if(is_array($data)){
                $msqlStmt->execute($data);
            }
            else{
                $msqlStmt->execute();
            }

            $result = $msqlStmt->setFetchMode(PDO::FETCH_ASSOC);

            return $msqlStmt->fetchAll();

        }
        else{

            return false;

        }
    }

    function insert($query,$data){

        try {
            // use exec() because no results are returned
            $this->_connection->exec($query);
            return true;
           // echo "New record created successfully";
          } catch(PDOException $e) {
            return false;
           // echo $sql . "<br>" . $e->getMessage();
          }

    }

    function update($query,$data){
        
        try{
        // Prepare statement
        $updateStmt = $this->_connection->prepare($query);
      
        if(is_array($data)){
            $updateStmt->execute($data);
        }
        else{
            $updateStmt->execute();
        }
        // echo a message to say the UPDATE succeeded
        //echo $updateStmt->rowCount() . " records UPDATED successfully";
        return true;
      } catch(PDOException $e) {
        //echo $query . "<br>" . $e->getMessage();
        return false;
        //echo $sql . "<br>" . $e->getMessage();
      }

    }

    function delete(){

    }

    function closeDB(){
        $this->_connection->close();
    }


};



?>