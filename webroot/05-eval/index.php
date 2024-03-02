<?php
 session_start();
?>
<DOCTYPE html>
<head>
<title>Test site:  remote code execution</title>
</head>
<?php
    // These examples demonstrate a server-side remote code execution
    // vulnerability, which is a way for a user to run arbitrary code
    // on the server hosting this page.  NEVER run this demo where
    // these files are hosted on the public Internet, or anywhere such
    // that another user can access this page, as they could gain
    // control of your system!
    if(isset($_POST['text'])) {
        // Example 1:  string from user gets interpreted as PHP using eval
        // eval:  run string as if it were PHP (DO NOT EVER DO THIS)
        // eval($_POST["text"]);


        // Example 2:  URL from user gets loaded as PHP
        // "require" is PHP's "import":  loads and runs the specified PHP file
        // require $_POST["text"];

        echo "For safety reasons, the code for this demo has been disabled--uncomment it in you're really sure you want to run it.";
    }
?>


<body>
    <h1>Load some PHP</h1>
    <p>Enter a URL to load some PHP code.  What could go wrong? <br /><br />
    <i>Note:  The PHP code for this demo has been disabled for safety reasons.  If you really want to run it, open this file, read the comments, and then edit the code.  For more info, see the lecture notes/recording.</i></p>
  <form id="form" method="POST" action="index.php">
    <textarea id="text" cols="40" rows="5" name="text"></textarea><br />
    <input id="btn" type="submit" name="submit" value="Upload!">
  </form>

    <a href="./index.php">Main page</a>

</body>
</html>

