<?php
/**
 * Created by PhpStorm.
 * User: smoriarty
 * Date: 7/8/14
 * Time: 1:11 PM
 */
session_start();
session_destroy();
session_commit();

header('Location: login.php');
?>