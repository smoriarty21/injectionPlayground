<?php
/**
 * Created by PhpStorm.
 * User: smoriarty
 * Date: 7/4/14
 * Time: 4:42 AM
 */
include "sqlcon.php";

//Create DB object
$db = new database();

//Connect to DB
$db->connect();

//Return Comments for AJAX
echo $db->getComments();

?>