<?php

class Picture {

    // TODO : fix "place" variablel, either with meta, or some other shit

    private $place = "uis 24/7";

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
                    FROM pictures
                    WHERE picture_id='$picture_id'";

            $result = mysqli_query($this->connection,$sql);
            if ($row = mysqli_fetch_assoc($result)) {
                $picture = array(
                    "picture_id" => $row["picture_id"],
                    "filename" => $row["filename"],
                    "extension" => $row["extension"],
                    "path" => $row["path"],
                    "place" => $row["place"],
                    "upload_date" => $row["upload_date"],
                );
            }
            return $picture;
        }

    }


    function listPictures($sql = "SELECT * FROM pictures") {

        $result = mysqli_query($this->connection,$sql);
        if (!$result) {echo "this shit here ($sql) didn't work" . mysqli_error($this->connection); exit;}
        //if (mysqli_num_rows($result) == 0) {echo "this gallery is empty! BYE!";exit;}
        while($row = mysqli_fetch_assoc($result))
        {
            $this->picture_array[$row["picture_id"]] =  array(
                "picture_id" => $row["picture_id"],
                "filename" => $row["filename"],
                "extension" => $row["extension"],
                "path" => $row["path"],
                "place" => $row["place"],
                "upload_date" => $row["upload_date"],
            );
        }
        $new_array = array();
        if (!mysqli_num_rows($result)==0) {
            foreach ($this->picture_array as $picture) {
                $new_array[] = $this->loadPicture($picture["picture_id"]);
            }
        }
        mysqli_free_result($result);
        return $new_array;
    }

    // TODO : this is just temporary implementation, should be expanded



    function addPicture($filename, $extension, $path) {
        // TODO: fix $this->place !!!
        $sql = "INSERT INTO pictures
                (filename, extension, path, place, upload_date)
                VALUES ('$filename', '$extension','$path','$this->place',NOW());";

        if (mysqli_query($this->connection,$sql) === TRUE) {
            echo "picture is added to db";
        } else {
            echo "err: " . $sql . "<br>" . $this->connection->error;
        }
    }


    function dumpDatabase(){
        $sql = "TRUNCATE TABLE ";

        if (mysqli_query($this->connection, $sql . "pictures;")!==TRUE) {echo "all WRONGED" ."pictures";}
        if (mysqli_query($this->connection, $sql . "meta;")!==TRUE) {echo "all WRONGED"."meta";}
        if (mysqli_query($this->connection, $sql . "has_meta;")!==TRUE) {echo "all WRONGED"."has_meta";}
        if (mysqli_query($this->connection, $sql . "has_album;")!==TRUE) {echo "all WRONGED"."has_album";}
        if (mysqli_query($this->connection, $sql . "album;")!==TRUE) {echo "all WRONGED"."album";}

        header('Location: '.'index.php');
    }

    function removePicture($picture_id){
        $sql = "
            DELETE FROM pictures
            WHERE picture_id=$picture_id";

        if (mysqli_query($this->connection, $sql)!==TRUE){
            echo "failed at removeing file" . $sql;
        }

        header('Location: '.'index.php');
    }

    function getSortedBySQL($value, $order, $amount=0) {
        if ($amount == 0) {$amount = "";}
        else {$amount = "LIMIT $amount";}

        if ($order == 0) {$order = "DESC";}
        else if ($order > 0) {$order = "ASC";}

        $sql = "SELECT *
                FROM pictures
                ORDER BY $value $order
                $amount";

        return $this->listPictures($sql);
    }

    // TODO : add funcitons for EDITING pictures from database

}