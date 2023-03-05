<?php
session_start();
?>
    <DOCTYPE html>
        <head>
        <title>Test site:  Login page</title>
            </head>
            <body>
<?php
            require 'db.php';

// User input
$user = $_POST['username'];
$pass = $_POST['password']; // Should actually hash this

// SELECT * from users WHERE username = '<form value>' AND password = ''
$result = $db->query("SELECT * from users WHERE username = '" .  $user . "' AND password = '" . $pass . "'");
if (count($result) > 0) {
    $this_user = $result[0]["username"];
    $profile = $result[0]["profile"];
    $_SESSION["user"] = $this_user;

    echo 'Logged in as:  ' . $this_user;
    echo '<br />';
    echo 'Profile:  ' . $profile;
} else {
    echo 'Invalid login!';
}
?>

    <br />
        <a href="./index.php">Go back</a> |
    <a href="./comments.php">Comments</a>
    </body>
</html>
<?php
// Better way:  use a prepared query
// $stmt = $db->db->prepare('SELECT * from users WHERE username = :user AND password = :pass');
// $r = $stmt->execute([':user' => $user, ':pass' => $pass]);
// $result = $stmt->fetchAll();
?>
