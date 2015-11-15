<?php
/*

    META initialiserer en metaclass (fra app.php)
    Denne har følgende metoder:

    - getMeta()     -- returns the meta as an assosiative array
    - writeMeta();  -- writes IPTC header to the file (writes meta)

*/


class Meta {

    private $conn;
    private $path;
    private $metaclass;


    public function __construct($conn, $path) {
        $this->conn = $conn;
        $this->path = $path;

        $this->setup();

    }

    public function setup() {
        $this->metaclass = new Metaclass($this->path);
    }

    public function getMeta() {

        return $this->metaclass->getMeta();

    }
    public function writeMeta($array) {

        $sql = "";


        $sql = "SELECT tags_id FROM tags WHERE tags LIKE '$tag'";
        $result = mysqli_query($this->connection, $sql);
        if ($result!=TRUE){
            echo "failed at getting tagID wtf " . $sql;
        }
        while($row = mysqli_fetch_assoc($result)){$tags_id = $row['tags_id'];}


        /*

            Update the database here

        */

        $this->metaclass->writeMeta();
    }


}



require("app.php");

$metaclass = new Meta("","./samples/1.jpg");
$metaclass->getMeta();



?>
