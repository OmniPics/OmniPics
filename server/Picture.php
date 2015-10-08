<?php

class Picture {

    private $picture_array;
    public $connection;

    function __construct($local_database, $local_username, $local_password) {

        $this->connection = mysqli_connect("localhost",$local_username,$local_password,$local_database);

        if (!mysqli_select_db($this->connection, $local_database)) {
            echo "unable to select pics: " . mysqli_error();
            exit;
        }
        if (!$this->connection) {
            echo "unable to get inside: " . mysqli_error();
            exit;
        }
    }


    function loadPicture($picture_id) {
        $picture = array(
            'picture_id' => 0,
            'filename' => "",
            'extension' => "",
        );
        if ($picture_id > 0) {
            $sql = "SELECT *
                    FROM Pictures
                    WHERE picture_id='$picture_id'";

            $result = mysqli_query($this->connection,$sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $picture = array(
                    "picture_id" => $row["picture_id"],
                    "filename" => $row["filename"],
                    "extension" => $row["extension"],
                    "path" => $row["path"],
                );
            }
            echo "<br>";
            return $picture;
        }

    }


    function listPictures() {

        $sql = "SELECT *
        FROM   Pictures";

        $result = mysqli_query($this->connection,$sql);
        if (!$result) {echo "this shit here ($sql) didn't work" . mysqli_error(); exit;}
        if (mysqli_num_rows($result) == 0) {echo "the rows are empty, bye";exit;}
        while($row = mysqli_fetch_assoc($result))
        {
            $this->picture_array[$row["picture_id"]] =  array(
                "picture_id" => $row["picture_id"],
                "filename" => $row["filename"],
                "extension" => $row["extension"],
                "path" => $row["path"],
            );
        }

        mysqli_free_result($result);

        $new_array = array();
        foreach ($this->picture_array as $picture) {
            $new_array[] = $this->loadPicture($picture["picture_id"]);
            //$picture;
        }
        return $new_array;
    }

    // TODO : add funcitons for ADDING REMOVEING EDITING DISPLAYING DELETING pictures from database
    /*
     *
     *
     */



}