<?php
/**
 * Created by PhpStorm.
 * User: smoriarty
 * Date: 7/8/14
 * Time: 10:08 AM
 */
include "sqlcon.php";
if(isset($_POST['login'])) {
    //Create DB object
    $db = new database();

    //Connect to DB
    $db->connect();

    //Verify User
    $db->verifyUser($_POST['username'], $_POST['password']);
}

?>

<html>
    <head>
        <title>Login</title>
    </head>
    <body>
        <div style="float: right">
            <form method="post" action="">
                Username:
                <input type="text" size="12" id="username" name="username" />
                Password:
                <input type="password" size="12" id="password" name="password" />
                <input type="submit" id="login" name="login" value="Login" />
            </form>
        </div>
    </body>
</html>