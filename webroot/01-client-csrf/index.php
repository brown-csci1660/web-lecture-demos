<?php
 session_start();
?>
<DOCTYPE html>
<head>
<title>Test site</title>
<script src="assets/checks.js"></script>
</head>
<h1>Your account</h1>
<?php
 if(isset($_SESSION['profile']))
 {
     echo 'Your profile:  ' . $_SESSION['profile'];
 } else {
     echo 'You have not set your profile.';    
 }
?>

<h1>Update your profile</h1>
<body>
  <p>Enter your new profile information:</p>
  <form id="form" method="GET" action="update.php">
    <input id="text" type="text" name="profile-data">
    <input id="btn" type="submit" name="submit" value="Update" onclick="return validateInput();">
  </form>

<br />
<a href="./better.php">Slightly better version</a>

</body>
</html>
