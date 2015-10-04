<?php

/*
    AUTHOR: thomas darvik
    Website: http://www.darvik.net
    version: 1.0
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
        TODO
    */
    public function debug(){

    }
    /*
        TODO
    */
    public function deleteImages() {

    }
    /*
        TODO
    */
    public function updateDb($command) {

        
    }

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
