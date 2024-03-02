<?php
 session_start();
?>
<!DOCTYPE html>
<head>
   <meta http-equiv="Content-Security-Policy"
     content="default-src 'self';" />

<title>Test site:  comments</title>
</head>
<body>
<?php
    require 'db.php';

    // XSS:  Example hand-crafted sanitization function (not safe)
    function xss_sanitize($str) // TODO:  is this good enough?  (Hint: lol no)
    {
        $str = str_replace("script", "", $str);
        return $str;
    }


    // SQL query, new version:  Prepare query:  parsing happens here, before any user input
    $stmt = $db->db->prepare('INSERT INTO comments (id, who, text) values (NULL, :user, :text)');

    if(isset($_SESSION['user']) and isset($_POST['text'])) {
        $user = $_SESSION["user"];
        $text = $_POST["text"];

        // SQL, OLD VERSION:  Load comment from the database:  original version
        //$db->query("INSERT into comments (id, who, text) values (NULL, '" . $user . "' ,'" . $text . "')");

        // SQL, NEW VERSION:  Execute prepared query given user input
        // XSS note:  if we were sanitizing for XSS, would need to sanitize this too!
        $stmt->execute([':user' => xss_sanitize($user),
                        ':text' => xss_sanitize($text)]);

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

    <h1>View comments</h1>
    <ul>
<?php
$comments = $db->query("SELECT * from comments;");
foreach ($comments as $c) {
    // XSS:  Sanitize user inputs when reading from the database
    echo '<li><b>' . xss_sanitize($c["who"]) . "</b>: " . xss_sanitize($c["text"]) . "</li>";
}
?>
    </ul>

        <h1>Post a comment</h1>
  <form id="form" method="POST" action="comments.php">
    <textarea id="text" cols="40" rows="5" name="text"></textarea><br />
    <input id="btn" type="submit" name="submit" value="Post!">
  </form>

 <a href="./index.php">Main page</a> |
    <a href="./setup.php">Reset database</a> |
    <a href="./404.php?page=http://localhost:8080/doesnotexist.php">Bad page</a>

</body>
</html>

<?
    //     $stmt = $db->db->prepare('INSERT INTO comments (id, who, text) values (NULL, :user, :text)');
        // $stmt->execute([':user' => $user, ':text' => $text]);
?>
