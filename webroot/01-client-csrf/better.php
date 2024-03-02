<?php
require './util.php';
_session_setup();
?>
<!DOCTYPE html>
<head>
<title>Test site:  slightly better version</title>
</head>
<body>
<h1>Your account</h1>
<?php
 if(isset($_SESSION['profile']))
 {
     echo 'Your profile:  ' . $_SESSION['profile'];
 } else {
     echo 'You have not set your profile.';
 }
?>

<h1>Update your profile (better version)</h1>
  <p><i>Note:  for attack examples and notes, see the source code for do-csrf.html, located in this directory.</i></p>
  <p>Enter your new profile information:</p>
  <form id="form" method="POST" action="update-post.php">
    <input id="text" type="text" name="profile-data">
    <input id="btn" type="submit" name="submit" value="Update better">
  </form>

<br />
<a href="./index.php">Original version</a>
</body>
</html>

