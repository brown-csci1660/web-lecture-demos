<?php
 session_start();
?>
<DOCTYPE html>
<head>
<title>Test site:  comments</title>
</head>
<?php
    require 'db.php';
    if(isset($_SESSION['user']) and isset($_POST['text'])) {
        $user = $_SESSION["user"];
        $text = $_POST["text"];
        //$db->query("INSERT into comments (id, who, text) values (NULL, '" . $user . "' ,'" . $text . "')");
        $stmt = $db->db->prepare('INSERT INTO comments (id, who, text) values (NULL, :user, :text)');
        $stmt->execute([':user' => $user, ':text' => $text]);

        echo 'Comment posted!';
    }
?>

<h1>User Info</h1>
<?php
 if(isset($_SESSION['user']))
 {
     echo 'Logged in as :  ' . $_SESSION['user'];
 } else {
     echo 'Not logged in.';
 }
?>

<body>
    <h1>View comments</h1>
    <ul>
<?php
$comments = $db->query("SELECT * from comments;");
foreach ($comments as $c) {
    echo '<li><b>' . $c["who"] . "</b>: " . $c["text"] . "</li>";
}
?>
    </ul>

        <h1>Post a comment</h1>
  <form id="form" method="POST" action="comments.php">
    <textarea id="text" cols="40" rows="5" name="text"></textarea><br />
    <input id="btn" type="submit" name="submit" value="Post!">
  </form>

 <a href="./index.php">Main page</a> |
    <a href="./setup.php">Reset database</a>

</body>
</html>

