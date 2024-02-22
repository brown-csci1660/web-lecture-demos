<?php
 session_start();
?>
<!DOCTYPE html>
<head>
<title>Test site:  Profile update</title>
</head>
<body>
<?php
    if (isset($_GET['profile-data'])) {
        $_SESSION['profile'] = $_GET['profile-data'];
	echo 'Your profile has been updated:  ' . $_SESSION['profile'];
    } else {
        echo 'No profile specified!';
    }
?>

<br />
<a href="./index.php">Go back</a>
</body>
</html>
