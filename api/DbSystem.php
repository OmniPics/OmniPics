<?php

/*
    AUTHOR: thomas darvik
    Website: http://www.darvik.net
*/

    /*
    TODO: add XML-functionality

    */
class Request {
    public $value;
    public $key;
    public function __construct($value, $key){
        $this->value = $value;
        $this->key = $key;
    }
}
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

    public function handleRequest($request, $method) {

        $type = $request['REQUEST_METHOD'];
        
        $param = Array();

        foreach($request as $key =>$value) {
            $current = new Request($value, $key);
            array_push($param, $current);
        }
        $sql_string = $this->findParams($param);
        return $sql_string;
    }


    public function findParams($array) {
        $sql_string = "";
        $isFirst = true;        
    
        $imageIndex = "";
        $imageOffset = "";
        $selected = "";
        $sorted = "";
            
        foreach($array as $row){

            $arr = Array();


            if($row->key == "imageIndex") {
                $imageIndex = $row->value; 
                $sql_string .= " AND " . $row->key . "=" . $row->value;
                array_push($arr, $imageIndex);
            //    print_r("ImageIndex <br>");
            }

            if($row->key == "range") {
                $imageIndex = $row->value; 
                $sql_string .= " BETWEEN ";
            //    print_r("ImageIndex <br>");
            }

            if($row->key == "imageOffset") {
                $imageOffset = $row->value;
                $sql_string .= " AND " . $row->key . "=" . $row->value;
            //    print_r("imageOffset <br>");
            }
            if($row->key == "selected") {
                $selected = $row->value;
                $sql_string .= " AND " . $row->key . "=" . $row->value;
            //    print_r("Selected <br>");
            }
            if($row->key == "sorted") {
                $sorted = $row->value; 
                $sql_string .= " AND " . $row->key . "=" . $row->value;
            //    print_r("Sorted <br>");
            }

            /*if($isFirst == true) {
                $sql_string .= $row->key . "=" . $row->value;
                $isFirst = false;
            }elseif ($isFirst == false) {
                $sql_string .= " AND " . $row->key . "=" . $row->value;
            }*/
        }
        return $sql_string;
    }

    public function checkConnection() {
        if($this->conn) {
            return true;
        } else {
            return false;
        }
    }




    /*
        TODO:
        Implement some error-detection as well as exception-handling (basic)
    */
    public function connect() {
        $this->conn = mysqli_connect($this->link, $this->username, $this->password, $this->dbname);

        if($this->conn) {
            return "Connection check";
        } else {
            return "Connection not working";
        }
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
    public function formatData($type, $data) {
        if($type == "JSON") {
            // this will return the data as JSON
            $data = json_encode($data);
            return $data;
        } else if($type == "XML") {
            // this will return the data as XML
        }


    }
}


?>
