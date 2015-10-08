<?php

    require_once("simpleAPI.php");

    $me = new API("images2.json");
    $me->loadFile();
    $me->getImage(1);
    print_r("<br>");

    $me->getRange(1,30);

?>
