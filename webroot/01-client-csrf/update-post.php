<?php
require './util.php';
_session_setup();
?>
<!DOCTYPE html>
<head>
<title>Test site:  Profile update (POST version)</title>
</head>
<body>
<?php
    if (isset($_POST['profile-data'])) {
        $_SESSION['profile'] = $_POST['profile-data'];
	echo 'Your profile has been updated:  ' . $_SESSION['profile'];
    } else {
        echo 'No profile specified!';
    }
?>
<br />
<a href="./better.php">Go back</a>
</body>
</html>
