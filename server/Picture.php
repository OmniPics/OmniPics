<?php

class Picture {

    private $picture_array;
    public $connection;

    function __construct($local_database, $local_username, $local_password) {


        error_reporting(E_ALL ^ E_DEPRECATED);

        $connection = mysqli_connect($local_database, $local_username, $local_password);

        if (!mysqli_select_db("dbtomgli")) {
            echo "Unable to select products: " . mysqli_error();
            exit;
        }

        if (!$connection) {
            echo "Unable to connect to DB: " . mysqli_error();
            exit;
        }

    }


    function loadProduct($picture_id) {
        $picture = array(
            'picture_id' => 0,
            'filename' => "",
            'extention' => "",
        );
        if ($picture_id > 0) {
            $sql = "SELECT *
                    FROM Pictures
                    WHERE picture_id='$picture_id'";

            $result = mysqli_query($sql);

            if ($row = mysqli_fetch_assoc($result)) {
                $picture = array(
                    "picture_id" => $row["picture_id"],
                    "filename" => $row["filename"],
                    "extension" => $row["extension"],
                );
            }
            return $picture;
        }

    }


    function listProducts() {

        $sql = "SELECT *
        FROM   products";

        $result = mysqli_query($sql);
        if (!$result) {echo "this shit here ($sql) didn't work" . mysqli_error(); exit;}
        if (mysql_num_rows($result) == 0) {echo "the rows are empty, bye";exit;}
        while($row = mysql_fetch_assoc($result))
        {
            $this->picture_array[$row["picture_id"]] =  array(
                "picture_id" => $row["picture_id"],
                "filename" => $row["filename"],
                "extension" => $row["extension"],
            );
        }
        mysqli_free_result($result);

        $new_array = array();
        foreach ($this->picture_array as $picture) {
            $new_array[] = $this->loadProduct($picture["product_id"]);
            $picture;
        }
        return $new_array;
    }

    // TODO : add funcitons for ADDING REMOVEING EDITING DISPLAYING DELETING pictures from database
    /*
     *
     *
     */



}