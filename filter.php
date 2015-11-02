<?php
require 'instagraph.php';
require 'setup.php';
require 'Picture.php';

try
{
    $instagraph = Instagraph::factory('Mercedes Benz_SL_VVSCV3_545_1.jpg', 'output.jpg');
}
catch (Exception $e)
{
    echo $e->getMessage();
    die;
}

$instagraph->toaster(); // name of the filter ?>
