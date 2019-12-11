<?php
//my config file
ob_start();//preventing header error before reading the whole page
define('DEBUG','TRUE'); //we want to see all the errors
include('credentials.php');














function myerror($myFile, $myLine, $errorMsg)
{
if(defined('DEBUG') && DEBUG)
    {
    echo"Error in file: <b>".$myFile."</b> on line: <b>".$myLine."</b><br />";
    echo"Error Message: <b>".$errorMsg."</b><br />";
    die();
    }else{
        echo "Sorry, we have encountered an error. ";
        die();
}
}
?>