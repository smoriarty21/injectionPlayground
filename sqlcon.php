<?php
/**
 * Created by PhpStorm.
 * User: smoriarty
 * Date: 7/4/14
 * Time: 3:41 AM
 */
$comments = array();

class database {
    public function connect() {
        session_start();

        $connection = mysql_connect("127.0.0.1","root","");

        mysql_select_db('playground');

        if (!$connection) {
            die("Could not connect ".mysql_error());
        }
    }

    //Comment Functions
    public function addComment($comment, $name) {
        $query = "INSERT INTO comments(comment, name) VALUES ('$comment', '$name')";

        mysql_query($query) or die(mysql_error());
    }

    public function getComments() {
        $comments = array();

        $query = "SELECT comment, name FROM comments ORDER BY id DESC LIMIT 10 ";
        $result = mysql_query($query);

        while($row = mysql_fetch_array($result)) {
            $comments[] = $row;
        }

        print json_encode($comments);
    }

    //Auth functions
    public function verifyUser($user, $password) {
        //Hash password and check
        $password = md5($password);

        $query = "SELECT id FROM users WHERE username='$user' AND password='$password'";
        $result = mysql_query($query);
        $row = mysql_fetch_row($result);

        if(!empty($row)) {
            //Good login info
            $this->login($user);
        } else {
            //Bad login info
            echo $query;
        }
    }

    public function login($user) {
        //Set session variables and redirect
        $_SESSION['loggedIn'] = true;
        $_SESSION['username'] = $user;

        //Set cookie for xss testing
        $session = rand(100,999999).$_SESSION['username'].rand(0,99999).time(); //Random session ID
        setcookie("id", md5($session),time()+3600);

        header('Location: index.php');
    }

    public function checkLogin() {
        //Test for valid login
       if($_SESSION['loggedIn'] != true) {
           header('Location: login.php');
       }
    }
}

?>