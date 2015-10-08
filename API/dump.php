<?php

    require_once("simpleAPI.php");

    $me = new API("images.json");
    $me->loadFile();
    $me->getImage(1);

?>
