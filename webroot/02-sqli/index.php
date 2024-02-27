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
 require 'db.php';
 if(isset($_SESSION['user']))
 {
     echo 'User:  ' . $_SESSION['user'];
 } else {
     echo 'You are not logged in.';
 }
?>

<h1>Login form</h1>
<body>
  <p>Please log in:</p>
  <form id="form" method="POST" action="login.php">
    <input id="text" type="text" placeholder="Username" name="username">
    <input id="text" type="password" placeholder="Password" name="password">
    <input id="btn" type="submit" name="submit" value="Login">
  </form>
</body>
<br />
<a href="./setup.php">Reset database</a>
</html>
