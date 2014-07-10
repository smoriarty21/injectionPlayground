<?php
include "sqlcon.php";

$db = new database();

$db->connect();

$db->checkLogin();

$error = "";

if(isset($_POST['send'])) {
   $error = $_POST['message'];
}

if(isset($_POST['submit-comment'])) {
    $db->addComment($_POST['comment-area'], $_POST['users-name']);
}

?>

<html>
<head>
    <title>XSS Playground</title>

    <link rel="stylesheet" href="style.css" type="text/css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script src="js/comments.js"></script>
    <script src="js/post.js"></script>
</head>
<body>

<br />

<div id="comments">
    <form method="post" action="">
        <img src="http://awwwards.de/awards/images/2013/01/digital-artwork-mosaic-portraits-charis-tsevis-cover.jpg" /><br />
        <textarea cols="50" rows="5" placeholder="Please leave a comment on the artwork here" name="comment-area" ></textarea><br />
        <input type="text" placeholder="Please enter name" size="20" name="users-name" /><br />

        <input type="submit" value="Leave Comment" name="submit-comment">
    </form>

    <div id="comment-feed-wrapper">
        <table>
            <thead align="left">
                <tr>
                    <th>Comment</th>
                    <th>User</th>
                </tr>
                <tr><td colspan="2"><hr></td></tr>
            </thead>
            <tbody id="comment-tbody">
            </tbody>
        </table>
    </div>
</div>

<hr />

<form method="post" action="">
    <input type="text" name="message"><br />
    <input type="submit" value="Send" name="send"><br />
</form>

<?php echo $error; ?>

<hr />

<form method="post" action="cgi-bin/git.py">
    <input type="hidden" value="test" name="data">
    <input type="submit" name="sendit" />
</form>

<div id="logout">
    <a href="logout.php">Logout</a>
</div>

</body>
</html>

