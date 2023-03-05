<?php
 session_start();
?>
<DOCTYPE html>
<head>
<title>Test site:  slightly better version</title>
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
  <form id="form" method="POST" action="update-post.php">
    <input id="text" type="text" name="profile-data">
    <input id="btn" type="submit" name="submit" value="Update better">
  </form>

</body>
</html>

