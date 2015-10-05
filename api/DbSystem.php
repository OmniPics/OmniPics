<?php

/*
    AUTHOR: thomas darvik
    Website: http://www.darvik.net
*/

    /*
    TODO: add XML-functionality

    */
class DBsystem {

    private $conn;

    private $link;
    private $username;
    private $password;
    private $dbname;

    public function __construct($link, $username, $password, $dbname) {
        
        if(!$link) {
            array_push($errors, "No link");
            throw new Exception("No link", 1);
            
        }elseif (!$username) {
            array_push($errors, "No username");
            throw new Exception("No username", 1);
        }elseif (!$password) {
            array_push($errors, "No password");
            throw new Exception("No password", 1);
        }elseif (!$dbname) {
            array_push($errors, "No dbname");
            throw new Exception("No dbname", 1);
        }

        $this->link = $link;
        $this->username = $username;
        $this->password = $password;
        $this->dbname = $dbname;
    }
    /*
        TODO:
        Debug functions
    */
    public function debug(){

    }
    /*
        TODO:
        Delete images (1 or more?) and update the database (important)
        --> set the isDeleted flat to true (at first)
    */
    public function deleteImages() {

    }
    /*
        TODO:
        implement the connection between the database and the
        API. This will take care of all the updates from the API (and client)
    */
    public function updateDb($command) {

    }

    /*
        TODO:
        Implement some error-detection as well as exception-handling (basic)
    */
    public function connect() {
        $this->conn = mysqli_connect($this->link, $this->username, $this->password, $this->dbname);
    }

    public function query($string) {
        // mysqli_query(connection, query);
        $result = mysqli_query($this->conn, $string);
        // results
        if($result) {
            $array = Array();
            while($row = mysqli_fetch_row($result)) {
                array_push($array, $row);
            }

            return $array;

        } else {
            // error handling
            print_r("no results");
        }
    }

    /*
        Handle the data given by the querys
    */
    public function handleData($type, $data) {
        if($type == "JSON") {
            // this will return the data as JSON
            return json_encode($data);
        } else if($type == "XML") {
            // this will return the data as XML
        }


    }
}


?>
