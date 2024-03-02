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

// Fetch data from request
$user = $_POST['username'];
$pass = $_POST['password']; // In a real system, this should be hashed and salted, but we'll ignore it for now

// Make the query
// SELECT * from users where username = 'alice' AND password = <form value>
$result = $db->query("SELECT * from users WHERE username = '" .  $user . "' AND password = '" . $pass . "'");

// Look for results
// In this version, the query should return >1 row if user found, 0 if not
if (count($result) > 0) {
    $this_user = $result[0]["username"];
    $profile = $result[0]["profile"];
    $_SESSION["user"] = $this_user; // Set up the user's session token and info

    echo 'Logged in as:  ' . $this_user;
    echo '<br />';
    echo 'Profile:  ' . $profile;
} else {
    echo 'Invalid login!';
}
?>
    <br />
        <a href="./index.php">Go back</a> | <a href="./setup.php">Reset database</a>
    </body>
</html>

<?php
// Better way:  use a query with prepared statements
// $stmt = $db->db->prepare('SELECT * from users WHERE username = :user AND password = :pass');
// $r = $stmt->execute([':user' => $user, ':pass' => $pass]);
// $result = $stmt->fetchAll();
?>
