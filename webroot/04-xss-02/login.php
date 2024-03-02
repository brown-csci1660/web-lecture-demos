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

// Example hand-crafted sanitization function
// Could this catch everything?  No!
function do_sanitize($str)
{
    return str_replace("'", "\'", $str);
}

// User input (now with sanitization)
$user = do_sanitize($_POST['username']);
$pass = do_sanitize($_POST['password']);

// SQL query:  original method
// SELECT * from users WHERE username = '<form value>' AND password = ''
// $result = $db->query("SELECT * from users WHERE username = '" .  $user . "' AND password = '" . $pass . "'");

// SQL query:  using prepared statement
$stmt = $db->db->prepare('SELECT * from users WHERE username = :user AND password = :pass');
$r = $stmt->execute([':user' => $user, ':pass' => $pass]);
$result = $stmt->fetchAll();


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
    <a href="./comments-better.php">Comments</a>
    </body>
</html>

<?php
// Better way:  use a prepared query
// $stmt = $db->db->prepare('SELECT * from users WHERE username = :user AND password = :pass');
// $r = $stmt->execute([':user' => $user, ':pass' => $pass]);
// $result = $stmt->fetchAll();
?>
