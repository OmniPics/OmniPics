<?php
class Tag{
    private $tag_array;
    function __construct(){
        if (isset($_SESSION['products'])) {
            $this->products = $_SESSION['products'];
        }
        else {
            $this->products = array();
        }
    }
}